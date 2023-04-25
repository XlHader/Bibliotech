<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class UpdateBookRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_avaible' => [
                'required',
                'boolean'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'is_avaible.required' => 'El estado del libro es requerido.',
            'is_avaible.boolean' => 'Ocurrio un error al actualizar el estado del libro, el valor que se envío no es un booleano.'
        ];
    }
}