<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
  protected $guarded = [];

  public function responseSurveys()
  {
    return $this->hasMany(ResponseSurveys::class,'surveysId');
  }
}
