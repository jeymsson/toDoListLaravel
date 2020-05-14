<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function state()
    {
        return $this->hasOne('App\States', 'country_id', 'id');
    }
    public function states()
    {
        return $this->hasMany('App\States', 'country_id', 'id');
    }
}
