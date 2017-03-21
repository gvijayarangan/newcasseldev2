<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $table='get_order_details';
    public $timestamps = false;
    protected $primaryKey = 'wo_id';
    protected $fillable=[
        'created_date_time',
        'center_name',
        'common_area_name',
        'apartment_number',
        'status',
        'priority',
        'assign_to',
        'createdDateTimeTo',


    ];


}
