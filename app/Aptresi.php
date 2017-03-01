<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;
use App\Resident;

class Aptresi extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'apt_id',
        'res_id',
        'start_date',
        'end_date' ,
    ];

    public function aptresi() {
        return $this->hasMany('App\aptresi');
    }

    public function conres() {
        return $this->hasMany('App\conresi');
    }

    public function center() {
        return $this->belongsTo('App\center');
    }
}
