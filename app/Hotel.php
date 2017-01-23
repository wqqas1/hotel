<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $fillable = ['Name','Address','City','Country','TelephoneNumber','description','ImagePath'];

  // A Hotel Belongs to a Partner .
  public function partner() {

      return $this->belongsTo(Partner::class);

    }

    /* Sets the relationship and then declare a function which uses the relationship
      to save a review.  */
  public function reviews() {

      return $this->hasMany(Review::class);

    }

            public function addReview(Review $review) {

                    return $this->reviews()->save($review);

              }



    /* Sets the relationship and then declare a function which uses the relationship
       to save a Room.  */
    public function rooms() {

        return $this->hasMany(Room::class);

    }

          public function addRoom(Room $room) {

                 return $this->rooms()->save($room);

          }

    /* Sets the relationship between
          A Hotel and a - Role , Photos, a thumbnail ,   */

     public function role() {


        return $this->hasOne(Role::class);

    }

    public function photos() {

        return $this->hasMany(HotelPhoto::class);

    }
    public function thumbnail() {

        return $this->hasOne(HotelPhoto::class);

    }

    //Checks to see if a review exists for the hotel and returns true or false.

    public function hasReview() {

       return (bool) $this->reviews()->first();
    }
}
