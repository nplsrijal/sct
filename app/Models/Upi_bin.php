<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upi_bin extends Model
{
    use HasFactory;

    protected $fillable = [
        'aggregator',
        'type',
        'route_bin',
        'bin',
        'name',
        'assigned_date',
        'bankid',
        'bankcode',
        'card_program',
        'account_program',
        'cbs_name',
        'binary_name',
        'card_type',
        'status',
    ];
}
