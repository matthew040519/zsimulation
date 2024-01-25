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

class ReportsController extends Controller
{
    //
    public function index()
    {
        $params = [];

        $params['system_setup'] = system_setup::first();
        $params['ps_list'] = perfectStructureModel::all();
        $params['so_list'] = spillover::all();
        $params['dr_list'] = directinvite::all();


        $params['total_package_srp'] = members::count() * $params['system_setup']->package_srp;
        $params['total_package_expense'] = members::count() * $params['system_setup']->package_expense;
        $params['total_dr'] = directinvite::count() * $params['system_setup']->direct_referall;
        $params['total_ps'] = perfectStructureModel::sum('amount');
        $params['total_pso'] = spillover::where('status', 1)->sum('commission');
        $params['total_iso'] = spillover::where('status', 0)->sum('commission');
        $params['total_expense'] = $params['total_dr'] + $params['total_ps'] + $params['total_pso'] + $params['total_iso'] + $params['total_package_expense'];
        $params['total_gross_sales'] = $params['total_package_srp'];
        $params['total_net_sales'] = $params['total_gross_sales'] - $params['total_expense'];

        return view('reports')->with('params', $params);
    }

    public function dataAnalytics()
    {
        $params = [];
        $params['system_setup'] = system_setup::first();
        $params['total_package_srp'] = members::count() * $params['system_setup']->package_srp;
        $params['total_package_expense'] = members::count() * $params['system_setup']->package_expense;
        $params['total_dr'] = directinvite::count() * $params['system_setup']->direct_referall;
        $params['total_ps'] = perfectStructureModel::sum('amount');
        $params['total_pso'] = spillover::where('status', 1)->sum('commission');
        $params['total_iso'] = spillover::where('status', 0)->sum('commission');
        $params['total_expense'] = $params['total_dr'] + $params['total_ps'] + $params['total_pso'] + $params['total_iso'] + $params['total_package_expense'];
        $params['total_gross_sales'] = $params['total_package_srp'];

        // $params['income_expense'] = ['y' => $params['total_expense'], 'label' => 'Expense', 'y' => $params['total_gross_sales'], 'label' => 'Gross Income'];

        $params['income_expense'] = [ ['y' => $params['total_expense'], 'label' => "Expense"], ['y' => $params['total_gross_sales'], 'label' => "Income"]];

        $params['expense'] = [ ['y' => $params['total_package_expense'], 'label' => "Package Expense"], 
                ['y' => $params['total_dr'], 'label' => "Direct Referall"],
                ['y' => $params['total_ps'], 'label' => "Perfect Structure"],
                ['y' => $params['total_pso'], 'label' => "Personal Spill Over"],
                ['y' => $params['total_iso'], 'label' => "Indirect Spill Over"]
            ];
        // dd($params['income_expense']);

        return view('data_analytics')->with('params', $params);
    }
}
