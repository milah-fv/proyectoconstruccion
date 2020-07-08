<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name' => 'required|unique:tags,name,'. $this->tag,
            'slug'   => 'required|unique:tags,slug,' . $this->tag,
        ];
        return $rules;
    }

    public function messages()
    {
        return
        [
            'name.required' => 'El nombre de la etiqueta es requerido',
            'name.unique'   => 'Este nombre ya se encuentra registrado',
            'slug.required'   => 'El slug de la etiqueta es requerido',
            'slug.unique'   => 'Este slug ya se encuentra registrado',
        ];
    }
}
