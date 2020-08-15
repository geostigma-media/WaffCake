<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseSurveys extends Model
{
  protected $guarded = [];

  public function surveys()
  {
    return $this->belongsTo(Surveys::class, 'surveysId');
  }

  public function users()
  {
    return $this->belongsTo(User::class, 'userId');
  }
}
