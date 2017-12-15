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
        return [
          'name' => 'required',
          'description' => 'required',
          'price' => 'required|numeric',
          'stock' => 'required|numeric',
          'category_id' => 'required'
          ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Debes ingresar un nombre',
          'description.required' => 'Debes ingresar una descripción',
          'price.required' => 'Debes ingresar el precio',
          'price.numeric' => 'El precio debe ser ingresado en formato numérico',
          'stock.required' => 'Debes ingresar el stock',
          'stock.numeric' => 'El stock debe ser ingresado en formato numérico',
          'category_id.required' => 'Debes seleccionar una categoría'
        ];
    }
}
