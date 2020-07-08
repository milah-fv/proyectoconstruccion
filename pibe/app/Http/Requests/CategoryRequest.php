<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules =[
            
            'name' => 'required|max:50|unique:categories,name,'.$this->get('id'),                      
        ];

        return $rules;
    }
    public function messages()
    {
        return
        [
            // 'name.required' => 'El nombre es requerido.',
            'name.max' => 'El maximo de caracteres es 50',
            'name.unique' => 'Categoria ya esta registrada',
        ];
    }
}
