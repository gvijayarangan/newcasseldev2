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
    public function comarea() {
        return $this->hasMany('App\comarea');
    }
    public function apartment() {
        return $this->hasMany('App\apartment');
    }

    public function resident() {
        return $this->hasMany('App\resident');
    }

  
}
