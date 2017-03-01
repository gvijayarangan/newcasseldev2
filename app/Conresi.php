<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conresi extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'res_id',
        'con_id',
    ];
    public function resident() {
        return $this->belongsTo('App\resident');
    }
    public function rescontact() {
        return $this->belongsTo('App\rescontact');
    }
}
