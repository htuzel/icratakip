<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User'); // her dava bir kullanıcıya ait
    }

    public function notes()
    {
        return $this->hasMany('App\Notes');  // her mahkemenin birden çok notu var
    }
}
