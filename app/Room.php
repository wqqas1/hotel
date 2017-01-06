<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function hotel() {

      return $this->belongsTo(Hotel::class);

      }
}
