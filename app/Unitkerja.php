<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    public function sumberdana() {
        return $this->belongsTo('App\Sumberdana');
    }
}
