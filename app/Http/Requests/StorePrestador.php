<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrestador extends FormRequest
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
            'nombre' => 'required|max:120',
            'apellido' => 'required|max:120',
            'documento' => 'required|numeric|unique:personas,documento',
            'fecha_nacimiento' => 'required|date',
            'genero_sigla' => 'required|size:2',
            'cuit' => 'nullable|numeric|unique:personas,cuit',
            'email' => 'nullable|email|unique:personas,email',
            'telefono' => 'nullable|numeric'
        ];
    }
}
