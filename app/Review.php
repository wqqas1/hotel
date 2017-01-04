<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment'];
    public function hotel() {


      return $this->belongsTo(Hotel::class);

    }
}
