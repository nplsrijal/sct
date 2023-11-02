<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Green_pin_activate extends Model
{
    use HasFactory,SoftDeletes;
    const DELETED_AT = 'archived_at';

    protected $fillable = [
        'bin','branch','card_number','status','isbulk','submitted_by','submitted_date','archived_by','created_at','created_by','updated_at','updated_by'
        
    ];
}
