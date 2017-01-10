<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  protected $fillable = ['CompanyName','CompanyEmail','HQAddress','user_id'];

    public function user() {

      return $this->belongsTo(User::class);


      }
}
