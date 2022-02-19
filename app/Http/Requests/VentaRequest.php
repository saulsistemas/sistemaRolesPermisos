<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        #if ($this->user_id == auth()->user()->id) {
        #    return true;
        #}else{
        #    return false;
        #}
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
            'fecha_venta'=>'required',
            'igv'=>'required',
        ];
        return $rules;
    }
}