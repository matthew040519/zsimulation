<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\system_setup;
use App\Models\members;
use App\Models\tree;
use App\Models\directinvite;
use App\Models\perfectStructureModel;
use App\Models\spillover;

class IndexController extends Controller
{
    //
    public function index()
    {
        $setupIsExist = system_setup::exists();

        return $setupIsExist ? redirect('/dashboard') : view('simulation');
    }

    public function dashboard()
    {
        
        $params = [];

        $params['system_setup'] = system_setup::first();

        $params['upline'] = tree::where('complete', 0)->get();
        $params['sponsors'] = members::all();

        return view('dashboard')->with('params', $params);
    }

    public function genology()
    {
        $params = [];

        $head = request()->username;

        $params['head'] = tree::where('username', $head)->first();

            $params['first_slot'] = tree::where('username', $params['head']->first_slot)->first();

            $params['second_slot'] = tree::where('username', $params['head']->second_slot)->first();

            $params['third_slot'] = tree::where('username', $params['head']->third_slot)->first();

            $params['fourth_slot'] = tree::where('username', $params['head']->fourth_slot)->first();
        

        return view('genology')->with('params', $params);
    }
}
