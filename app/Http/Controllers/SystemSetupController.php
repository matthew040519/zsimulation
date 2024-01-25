<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\system_setup;

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

        return redirect('/dashboard');

    }
}
