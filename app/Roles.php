<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  protected $guarded = [];

  public function user()
  {
    return $this->hasMany(Roles::class);
  }
}
