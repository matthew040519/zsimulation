<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\members;
use App\Models\tree;
use App\Models\directinvite;
use App\Models\perfectStructureModel;
use App\Models\system_setup;
use App\Models\spillover;

class MembersController extends Controller
{
    //
    public function addmembers(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'upline' => 'required',
            'sponsor' => 'required',
        ]);

        members::create($validated);
        directinvite::create([
            'username' => $request->username,
            'sponsor' => $request->sponsor
        ]);

        $tree = tree::where('username', $request->upline)->first();
        $system_setup = system_setup::first();

        if($tree->first_slot == "")
        {
            tree::where('username', $request->upline)->update(['first_slot' => $request->username]);
        }
        elseif($tree->second_slot == "")
        {
            tree::where('username', $request->upline)->update(['second_slot' => $request->username]);
        }
        elseif($tree->third_slot == "")
        {
            tree::where('username', $request->upline)->update(['third_slot' => $request->username]);
        }
        elseif($tree->fourth_slot == "")
        {
            tree::where('username', $request->upline)->update(['fourth_slot' => $request->username]);
        }

        if($request->sponsor != $request->upline)
        {
            $this->spillovers($request->upline, $request->username, 0);
        }

        $checkifcomplete = tree::where([ ['first_slot', '!=', ''], ['second_slot', '!=', ''], ['third_slot', '!=', ''], ['fourth_slot', '!=', ''], ['username', $request->upline] ])->count();

        if($checkifcomplete > 0)
        {
            tree::where('username', $request->upline)->update(['complete' => 1]);

            $treecomplete = tree::where('username', $request->upline)->first();

            $count_members = 0;
            $total_amount = 0;

            $first_slot = directinvite::where([ ['sponsor', $request->upline], ['username', $treecomplete->first_slot] ])->count();
            $second_slot = directinvite::where([ ['sponsor', $request->upline], ['username', $treecomplete->second_slot] ])->count();
            $third_slot = directinvite::where([ ['sponsor', $request->upline], ['username', $treecomplete->third_slot] ])->count();
            $fourth_slot = directinvite::where([ ['sponsor', $request->upline], ['username', $treecomplete->fourth_slot] ])->count();

            if($first_slot > 0)
            {
                $count_members += 1;
            }
            if($second_slot > 0)
            {   
                $count_members += 1;
            }
            if($third_slot > 0)
            {
                $count_members += 1;
            }
            if($fourth_slot > 0)
            {
                $count_members += 1;
            }

            if($count_members <= 1)
            {
                perfectStructureModel::create([
                    'username_bonus' => $request->upline,
                    'username' => $request->username,
                    'amount' => $total_amount,
                ]);
            }
            else
            {
                $total_amount = ($count_members * 0.25) * $system_setup->perfect_structure;

                perfectStructureModel::create([
                    'username_bonus' => $request->upline,
                    'username' => $request->username,
                    'amount' => $total_amount
                ]);
            }

            members::where('username', $request->upline)->update(['percentage' => $count_members]);

            $uplinedetails = members::where('username', $request->upline)->first();

            if($uplinedetails->upline != "")
            {
                $this->uplineCommission($uplinedetails->upline, $request->upline);
            }

        }

        tree::create([
            'username' => $request->username
        ]);

        return redirect('/dashboard');
    }

    public function uplineCommission($upline, $username)
    {
        $system_setup = system_setup::first();

        $uplinedetails = members::where('username', $upline)->first();
        
        $total_amount = ($uplinedetails->percentage * 0.25) * $system_setup->perfect_structure;

        perfectStructureModel::create([
            'username_bonus' => $upline,
            'username' => $username,
            'amount' => $total_amount
        ]);

        if($uplinedetails->upline != NULL)
        {
            $this->uplineCommission($uplinedetails->upline, $uplinedetails->username);
        }
    }

    public function spillovers($upline, $username, $count)
    {
        $system_setup = system_setup::first();

        $count += 1;

        $member_details = members::where('username', $username)->first();

        $uplinedetails = members::where('username', $upline)->first();

        if($member_details->sponsor == $upline)
        {
            spillover::create([
                'username_bonus' => $upline,
                'username' => $username,
                'commission' => $system_setup->personal_so,
                'level' => $count,
                'status' => 1
            ]);
        } else {
            spillover::create([
                'username_bonus' => $upline,
                'username' => $username,
                'commission' => $system_setup->indirect_so,
                'level' => $count,
                'status' => 0
            ]);
        }

        if($count != 4 && $uplinedetails->upline != "" && $member_details->sponsor != $upline)
        {
            $this->spillovers($uplinedetails->upline, $username, $count);
        }
        
    }

}
