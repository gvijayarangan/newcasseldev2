<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'user_id',
        'apt_id',
        'cntr_id',
        'ca_id',
        'order_description',
        'order_date_created',
        'order_priority',
        'order_status',
        'issue_type',
        'order_total_cost',
        'resident_comment',
        'last_status_modified',
        'requestor_name'
    ];

    public function orcomment() {
        return $this->hasMany('App\orcomment');
    }

    public function log() {
        return $this->hasMany('App\log');
    }
    public function assignorder() {
        return $this->hasMany('App\assignorder');
    }
    public function toolorder() {
        return $this->hasMany('App\toolorder');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }
    public function comarea() {
        return $this->belongsTo('App\comarea');
    }
    public function apartment() {
        return $this->belongsTo('App\apartment');
    }
    public function center() {
        return $this->belongsTo('App\center');
    }

    public function getOrderId()
    {
        return $this->id;
    }
}