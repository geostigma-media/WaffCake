<?php

namespace App\Http\Controllers\Auth;

use App\CuponBuy;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\EmailRegister;
use App\Mail\ReferenceClients;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  protected $redirectTo = '/home';

  public function __construct()
  {
    $this->middleware('guest');
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'confirmed'],
      'terminos' => ['required'],
    ]);
  }

  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'lastname' => $data['lastname'],
      'numIndentificate' => $data['numIndentificate'],
      'mobile' => $data['mobile'],
      'terminos' => $data['terminos'],
      'roleId' => 2,
    ]);
    //Mail::to($data['email'])->send(new EmailRegister());
  }
}
