<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resident;

class Rescontact extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'con_fname',
        'con_mname',
        'con_lname',
        'con_relationship',
        'con_cellphone',
        'con_email',
        'con_comment',
        'con_gender',
        'con_res_id'
    ];

    // public function user() {
    //    return $this->belongsTo('App\user');
    // }

    public function conres() {
        return $this->hasMany('App\conresi');
    }

}

