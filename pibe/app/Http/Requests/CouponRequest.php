<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            
            'title' => 'required|max:100',
            'published' => 'required',
            'enabled' => 'required',
            'code' => 'required|max:10|min:5|unique:coupons,code,'.$this->get('id'),
            'type' => 'required|max:20',
            'value' => 'nullable|integer',
            'percent_off' => 'nullable|integer',
        ];

        return $rules;
    }

    public function messages()
    {
        return
        [
            'title.required' => 'El campo es requerido.',
            'title.max' => 'El máximo de caracteres es 100.',
            'published.required' => 'El campo es requerido.',
            'enabled.required' => 'El campo es requerido.',
            'code.required' => 'El campo es requerido.',
            'code.min' => 'El mínimo de caracteres es 5.',
            'code.max' => 'El máximo de caracteres es 10.',
            'code.unique' => 'Este cupón ya esta registrado',
            'type.required' => 'El campo es requerido.',
            'type.max' => 'El máximo de caracteres es 20.',
            'value.integer' => 'Solo se permiten numeros enteros',
            'percent_off.integer' => 'Solo se permiten numeros enteros',
        ];
    }
}
