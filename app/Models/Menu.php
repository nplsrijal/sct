<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'modulename',
        'parentmoduleid',
        'url',
        'icon',
        'orderby',
        
    ];

    protected $table = "modules";
}
