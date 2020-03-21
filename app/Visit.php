<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Visit extends Model
{
    protected $fillable = [
        'apartment_id', 'guest_ip'
    ];

    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
