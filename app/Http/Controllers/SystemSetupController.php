<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\directinvite;
use Illuminate\Http\Request;
use App\Models\system_setup;
use App\Models\members;
use App\Models\perfectStructureModel;
use App\Models\tree;
use App\Models\spillover;

class SystemSetupController extends Controller
{
    //
    public function systemSetup(Request $request)
    {
        $validated = $request->validate([
            'package_srp' => 'required|numeric',
            'package_expense' => 'required|numeric',
            'direct_referall' => 'required|numeric',
            'personal_so' => 'required|numeric',
            'indirect_so' => 'required|numeric',
            'perfect_structure' => 'required|numeric',
        ],
        [
            'package_srp.required' => 'Package SRP field is required.',
            'package_srp.numeric' => 'Package SRP field must be numeric.',
            'package_expense.required' => 'Package Expense field is required.',
            'package_expense.numeric' => 'Package Expense field must be numeric.',
            'direct_referall.required' => 'Direct Referall field is required.',
            'direct_referall.numeric' => 'Direct Referall field must be numeric.',
            'personal_so.required' => 'Personal Spill Over field is required.',
            'personal_so.numeric' => 'Personal Spill Over field must be numeric.',
            'indirect_so.required' => 'Indirect Spill Over field is required.',
            'indirect_so.numeric' => 'Indirect Spill Over field must be numeric.',
            'perfect_structure.required' => 'Perfect Structure Bonus field is required.',
            'perfect_structure.numeric' => 'Perfect Structure Bonus field must be numeric.',
        ]);

        system_setup::create($validated);

        $members = members::exists();

        $system_setup = system_setup::first();

        if($members)
        {
            $count_perfect = perfectStructureModel::exists();
            $count_spillover = spillover::exists();

            if($count_perfect)
            {
                $perfect_structure = perfectStructureModel::all();

                foreach($perfect_structure as $perfect_structures)
                {
                    $member_percent = members::where('username', $perfect_structures->username_bonus)->first();

                    $total_amount = ($member_percent->percentage * 0.25) * $system_setup->perfect_structure;

                    perfectStructureModel::where('username_bonus', $member_percent->username)->update([
                        'amount' => $total_amount,
                    ]);
                }
            }

            if($count_spillover)
            {
                $spillover = spillover::all();

                foreach($spillover as $spillovers)
                {
                    if($spillovers->status)
                    {
                        spillover::where([ ['status' => 1], ['username_bonus' => $spillovers->username_bonus] ])->update([
                            'commission' => $system_setup->personal_so
                        ]);
                    }
                    else
                    {
                        spillover::where([ ['status' => 0], ['username_bonus' => $spillovers->username_bonus] ])->update([
                            'commission' => $system_setup->indirect_so
                        ]);
                    }
                }
            }

        }
        else
        {
            members::create([
                'username' => 'root',
                'upline' => NULL,
                'sponsor' => NULL
            ]);
    
            tree::create([
                'username' => 'root'
            ]);
        }

        return redirect('/dashboard');

    }
}
