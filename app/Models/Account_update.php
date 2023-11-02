<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Account_update extends Model
{
    use HasFactory,SoftDeletes;
    const DELETED_AT = 'archived_at';

    
    protected $fillable = [
        'bin','branch','card_number','contact_number','customer_name','old_account','new_account','new_customer_code','isactivate','isupdatedetails','status',
        'isbulk','submitted_by','submitted_date','archived_by','created_at','created_by','updated_at','updated_by'
        
    ];
}
