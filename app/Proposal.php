<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
  protected $fillable = ['CompanyName','CompanyEmail','HQAddress','Vision'];
  public function user() {


    return $this->belongsTo(User::class);

  }

}
