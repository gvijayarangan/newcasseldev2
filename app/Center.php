<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    //
    public $timestamps = false;
    protected $fillable=[
        'cntr_name',
        'cntr_add1',
        'cntr_add2',
        'cntr_city',
        'cntr_state',
        'cntr_zip',
        'cntr_phone',
        'cntr_fax',
        'cntr_comments',

    ];

  
}
