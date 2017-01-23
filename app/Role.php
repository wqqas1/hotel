<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// sets the relationship between a role and a user.
class Role extends Model
{
    public function Users() {

      return $this->hasMany(User::class);

    }



}
