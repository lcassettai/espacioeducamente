<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSesion extends FormRequest
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
            'observaciones' => 'nullable',
            'fecha' => 'required|date',
            'evaluacion' => 'required|digits:1|digits_between:1,5',
            'prestacion_id' => 'numeric|numeric',
        ];
    }
}
