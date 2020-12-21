<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumberdana extends Model
{
    public function unitkerjas() {
        return $this->hasMany('App\UnitKerja');
    }
}
