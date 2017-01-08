<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $fillable = ['Name','Address','City','Country','TelephoneNumber','description','ImagePath'];

    public function reviews() {

      return $this->hasMany(Review::class);

      }

      public function addReview(Review $review) {

          return $this->reviews()->save($review);

         }

         public function rooms() {

           return $this->hasMany(Room::class);

          }
          public function addRoom(Room $room) {

              return $this->rooms()->save($room);

             }

             public function role() {


               return $this->hasOne(Role::class);

             }
}
