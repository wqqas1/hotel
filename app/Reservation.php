<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Sets the relationship between a Reservation and a Room / User.
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
