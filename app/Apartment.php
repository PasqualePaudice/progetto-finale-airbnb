<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Apartment extends Model{

    protected  $fillable = [
        'descrizione_appartamento','bagni', 'stanze', 'indirizzo', 'posti_letto', 'cover_image', 'metri_quadri','title','user_id','state', 'city', 'cap'
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Sponsor');
    }

    public function coordinate(){
            return $this->hasOne('App\Coordinate');
    }

    public function visits() {
        return $this->hasMany('App\Visit');
    }
    public function messages() {
        return $this->hasMany('App\Message');
    }


}
