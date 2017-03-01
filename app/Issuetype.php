<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issuetype extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'issue_typename',
        'issue_description',
    ];

    public function Issuetype() {
        return $this->belongsTo('App\order');
    }
}