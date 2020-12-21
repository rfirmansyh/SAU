<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesesuaian extends Model
{
    public function kertas_kerjas() {
        return $this->hasMany('App\Kertaskerja');
    }
}
