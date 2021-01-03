<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kertaskerja extends Model
{
    public function kesesuaian() {
        return $this->belongsTo('App\Kesesuaian');
    }
    public function keterlambatan() {
        return $this->belongsTo('App\Keterlambatan');
    }
    public function user() {
        return $this->belongsTo('App\User', 'created_by_uid');
    }
}
