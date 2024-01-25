<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system_setup extends Model
{
    use HasFactory;

    protected $fillable= ['id', 'package_srp', 'package_expense', 'direct_referall', 'personal_so', 'indirect_so', 'perfect_structure'];
}
