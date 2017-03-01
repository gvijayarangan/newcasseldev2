<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comarea extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'ca_name',
        'ca_comments',
    ];

    public function order() {
        return $this->hasMany('App\order');
    }

    public function center() {
        return $this->belongsTo('App\center');
    }


}
