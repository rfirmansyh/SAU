<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keterlambatan extends Model
{
    public function kertas_kerjas() {
        return $this->hasMany('App\Kertaskerja');
    }
}
