<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;

class  User extends Authenticatable
{
  use Notifiable;

  protected $fillable = [
    'name','email', 'password','lastname','numIndentificate','mobile',
    'userReferide','roleId','terminos'
  ];

  protected $hidden = [
      'password', 'remember_token',
  ];

  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function role()
  {
    return $this->belongsTo(User::class);
  }

  public function cartClient()
  {
    return $this->hasMany(ClientCard::class,'userId');
  }

  public function buysClientGeneral()
  {
    return $this->hasMany(BuysGeneral::class,'userId');
  }

  public function responseSurveys()
  {
    return $this->hasMany(ResponseSurveys::class);
  }
  public function sendPasswordResetNotification($token)
  {
      $this->notify(new ResetPasswordNotification($token));
  }
}
