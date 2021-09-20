<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrestacion extends FormRequest
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
            'servicio_id' => 'required|numeric',
            'prestador_id' => 'required|numeric',
            'tratamiento_id' => 'required|numeric',
            'fecha_alta' => 'required|date',
            'sesiones_asignadas' => 'required|numeric',
        ];
    }
}