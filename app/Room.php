<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['RoomType','Capacity','BedOption','Price','View'];

    public function hotel() {

      return $this->belongsTo(Hotel::class);

      }
}
