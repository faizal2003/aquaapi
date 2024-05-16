<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sens_warn extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_warn'
    ];

    public $timestamps = false;
}