<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        $producto = $this->route()->parameter('producto');
        $rules = [
            'codigo'=>'required|unique:productos',
            'nombre'=>'required',
            'stock'=>'required',
            'precio'=>'required',
            #'imagen'=>'image'
        ];
        if ($producto) {
            $rules['codigo']='required|unique:productos,codigo,'.$producto->id;
        }
        return $rules;
    }
}
