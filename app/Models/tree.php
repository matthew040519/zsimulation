<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tree extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'first_slot', 'second_slot', 'third_slot', 'fourth_slot', 'complete'];
}
