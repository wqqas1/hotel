<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Sets the relationship between a Review and a Hotel / User.
class Review extends Model
{
    protected $fillable = ['comment','rating'];
    public function hotel() {


      return $this->belongsTo(Hotel::class);

    }

    public function user() {


      return $this->belongsTo(User::class);

    }
}
