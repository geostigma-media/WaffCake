<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCard extends Model
{
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class,'userId');
  }

  public function cupons()
  {
    return $this->hasMany(CuponBuy::class,'regularClienteId');
  }
}
