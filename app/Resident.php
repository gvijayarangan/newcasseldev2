<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    public $timestamps = false;
    protected $fillable=[
        'id',
        'res_pccid',
        'res_fname',
        'res_mname',
        'res_lname',
        'res_gender',
        'res_homephone',
        'res_cellphone',
        'res_email',
        'res_comment',
        'res_status',
        'res_apt_id',
        'res_cntr_id'

    ];

     public function aptres() {
        return $this->hasMany('App\aptresi');
     }
    public function conres() {
        return $this->hasMany('App\conresi');
    }
   
}
