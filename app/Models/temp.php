<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp extends Model
{
    use HasFactory;

    protected $fillable = [
        'val',
        'time'
    ];

    public $timestamps = false;
}