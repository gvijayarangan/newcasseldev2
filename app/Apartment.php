<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'apt_floornumber',
        'apt_number',
        'apt_comments',
        'cntr_name',
    ];

    public function aptres() {
        return $this->hasMany('App\aptresi');
    }

    public function order() {
        return $this->hasMany('App\order');
    }

    public function center() {
        return $this->belongsTo('App\center');
    }
}
