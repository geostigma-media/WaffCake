<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'email' => 'required|unique:users',
    ];
  }

  public function messages()
  {
    return [
      'email.unique' => 'Este correo ya existe en nuesta base de datos, prueba otro',
    ];
  }
}
