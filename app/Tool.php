<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'tool_name',
        'tool_comment',
    ];

    public function toolorder() {
        return $this->hasMany('App\toolorder');
    }
}
