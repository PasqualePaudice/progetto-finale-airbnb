<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model{

    protected  $fillable = [
        'descrizione_appartamento','bagni', 'stanze', 'indirizzo', 'posti_letto', 'cover_image', 'metri_quadri','title','user_id'
    ];

    public function apartment(){

        return $this->belongsTo('App\User');

    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }


}
