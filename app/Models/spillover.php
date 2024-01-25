<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spillover extends Model
{
    use HasFactory;

    protected $fillable = ['username_bonus', 'username', 'commission', 'level', 'status'];
}
