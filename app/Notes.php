<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    public function court()
    {
        return $this->belongsTo('App\Court');  // Bu not bir mahkemeye ait
    }
}
