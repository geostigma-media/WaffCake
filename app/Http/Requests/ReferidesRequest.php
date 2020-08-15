<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReferidesRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'email' => 'required|unique:users',
      'numIndentificate' => 'required|unique:users',
      'password' => 'required', 'min:8', 'confirmed',
    ];
  }

  public function messages()
  {
    return [
      'password.required' => 'Este campo en Obligatorio',
      'password.min' => 'Este campo debe tener minimo 8 caracteres',
      'password.confirmed' => 'Las contraseñas no coinciden',
      'email.required' => 'Este campo en Obligatorio',
      'numIndentificate.required' => 'Este campo en Obligatorio',
      'email.unique' => 'Este correo ya existe en nuesta base de datos, prueba otro',
      'numIndentificate.unique' => 'Este numero de identidad ya existe en nuesta base de datos, prueba otro',
    ];
  }
}
