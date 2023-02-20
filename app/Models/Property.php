<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    // Added SoftDelets to activate soft detele;
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
}
