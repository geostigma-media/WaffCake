<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuponBuy extends Model
{
  protected $guarded = [];

  public function clientCard()
  {
    return $this->belongsTo(ClientCard::class,'regularClienteId');
  }
}
