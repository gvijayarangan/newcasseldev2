<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplyorder extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'sup_id',
        'order_id',
        'supord_units',
        'supord_total',
    ];

    public function order() {
        return $this->belongsTo('App\order');
    }
    public function supply() {
        return $this->belongsTo('App\supply');
    }
}
