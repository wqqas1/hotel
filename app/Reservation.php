<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function room() {

        return $this->belongsTo(Room::class);


     }
     public function user() {

         return $this->belongsTo(User::class);


      }
}
