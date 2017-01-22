<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  protected $guarded = ['id'];
    public function room() {

        return $this->belongsTo(Room::class);


     }
     
     public function user() {

         return $this->belongsTo(User::class);


      }
}
