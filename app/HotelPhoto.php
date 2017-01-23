<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// A model for the Room Photos of a Hotel.
class HotelPhoto extends Model
{
    protected $table = 'hotel_photos';
    protected $fillable = ['path'];
    public function hotel() {

        return $this->belongsTo(Hotel::class);
    }
}
