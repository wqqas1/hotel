<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Sets the relationship between a partner and Hotels / a User.
class Partner extends Model
{
    protected $fillable = ['CompanyName','CompanyEmail','HQAddress','user_id'];

    public function hotels() {

        return $this->hasMany(Hotel::class);

    }

    public function user() {

         return $this->belongsTo(User::class);


    }
}
