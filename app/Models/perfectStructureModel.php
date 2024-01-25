<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perfectStructureModel extends Model
{
    use HasFactory;

    protected $table = 'perfect_structure_bonus';

    protected $fillable = ['username_bonus', 'username', 'amount'];
}
