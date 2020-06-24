<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RealEmail;

class CustomerRequest extends FormRequest
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

    public function rules()
    {
        $rules =[
            
            'name' => 'required|max:150',
            'last_name' => 'required|max:150',
            'email' => 'required|max:150|unique:customers,email,'.$this->get('id'),
            new RealEmail,
            'dni' => 'required|max:10|unique:customers,dni,'.$this->get('id'),
            'celphone' => 'required|max:20',
            'phone' => 'nullable',
            
        ];

        return $rules;
    }

    public function messages()
    {
        return
        [
            'name.required' => 'El campo es requerido.',
            'name.max' => 'El máximo de caracteres es 150',
            'last_name.required' => 'El campo es requerido.',
            'last_name.max' => 'El máximo de caracteres es 150.',
            'email.required' => 'El campo es requerido.',
            'email.max' => 'El máximo de caracteres es 10.',
            'email.unique' => 'Este email ya esta registrado',
            'dni.required' => 'El campo es requerido.',
            'dni.max' => 'El máximo de caracteres es 10.',
            'dni.unique' => 'Este DNI ya está registrado.',
            'celphone.required' => 'El campo es requerido.',
            'celphone.max' => 'El máximo de caracteres es 20.',
          
        ];
    }
}
