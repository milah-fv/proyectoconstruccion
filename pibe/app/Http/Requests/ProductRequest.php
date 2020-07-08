<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          'name' => 'required|max:191',
          'weight' => 'nullable|numeric|between:0,99999999.99',
          'price' => 'required|numeric|between:0,99999999.99',
          'oldprice' => 'nullable|numeric|between:0,99999999.99',
          'stock' => 'nullable|numeric|between:1,500',
          'features' => 'required|max:500',
          'description' => 'required',
          'sizes' => '',
          'cover_image' => 'image',
          'images.*' => 'image'
        ];

        if (($this->request->get('state')) == 'Oferta' ) 
        {
          $rules['oldprice'] = 'required|numeric|between:0,99999999.99';
        }

        if (!($this->request->get('id_product'))) 
        {
            $rules['cover_image'] = 'required|image';
        }

        return $rules;
    }
    public function messages()
    {
        return
        [
            'name.required' => 'Nombre es requerido.',
            'weight.required' => 'Peso es requerido',
            'weight-numeric' => 'Solo numeros por favor',
            'price.required' => 'Precio es requerido',
            'price.numeric' => 'Solo numeros por favor',
            'oldprice.numeric' => 'Solo numeros por favor',
            'stock.required' => 'Stock es requerido',
            'stock.numeric' => 'Solo numeros por favor',
            'features.required' => 'Ingrese alguna caracteristica por favor',
            'oldprice.required' => 'Campo requerido',
            'description.required' => 'Ingrese alguna descripción por favor',
            'sizes.required' => 'Campo requerido',
            'cover_image.required' => 'Campo requerido',
            'cover_image.image' => 'Solo imagenes',
            'images.*.image' => 'Solo imagenes'
        ];
    }
}
