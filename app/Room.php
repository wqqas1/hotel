<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Sets the relationship between a Room and a Hotel / Reservations.
class Room extends Model
{
    protected $fillable = ['RoomType','Capacity','BedOption','Price','View','TotalRooms'];
    public function hotel() {

      return $this->belongsTo(Hotel::class);

    }
    public function reservation() {

        return $this->hasMany(Reservation::class);


    }
}
