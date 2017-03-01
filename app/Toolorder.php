<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toolorder extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'tool_id',
        'order_id',
    ];

    public function order() {
        return $this->belongsTo('App\order');
    }
    public function tool() {
        return $this->belongsTo('App\tool');
    }
}
