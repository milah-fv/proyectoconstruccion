<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'max:150|required',
            'last_name' => 'max:150|required',
            'avatar' => 'image',
            'email' => 'required|email|max:150|unique:users,email,'.$this->get('id'),
            'password' => 'string|min:6|confirmed',
            'celphone' => 'required|min:6',
        ];
        return $rules;
        
    }
    public function messages()
    {
        return
        [
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El maximo de caracteres es 150',
            'last_name.max' => 'El maximo de caracteres es 150',
            'last_name.required' => 'El nombre es requerido.',
            'email.required' => 'El email es requerido.',
            'email.max' => 'El maximo de caracteres es 150',
            'email.unique' => 'Este email ya esta registrado',
            // 'password.required' => 'La contraseña es requerida.',
            'password.string' => 'Debe poner una cadena de caracteres',
            'password.min' => 'El minimo de caracteres es 6',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'celphone.min' => 'El minimo de caracteres es 6',
            'celphone.required' => 'El numero de celular es requerido.',
            
        ];
    }
}
