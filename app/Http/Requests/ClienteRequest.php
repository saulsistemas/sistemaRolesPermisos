<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
     public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $cliente = $this->route()->parameter('cliente');
        $rules = [
            'codigo'=>'required|unique:clientes',
            'nombre'=>'required',
        ];
        if ($cliente) {
            $rules['codigo']='required|unique:clientes,codigo,'.$cliente->id;
        }
        return $rules;
    }
}
