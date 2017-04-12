<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'wo_id',
        'requestor',
        'closed_by_id',
        'created_by',
        'center_name',
        'apt_num',
        'common_area',
        'status'
    ];

}