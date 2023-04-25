<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'sometimes',
                'string',
                'min:2',
                'max:255'
            ],
            'last_name' => [
                'sometimes',
                'string',
                'min:2',
                'max:255'
            ],
            'document_type_id' => [
                'sometimes',
                'integer',
                'exists:document_types,id'
            ],
            'document_number' => [
                'sometimes',
                'string',
                'min:2',
                'max:255'
            ],
            'birth_date' => [
                'sometimes',
                'date'
            ],
            'phone_number' => [
                'sometimes',
                'string',
                'min:2',
                'max:255'
            ],
            'direction' => [
                'sometimes',
                'string',
                'min:2',
                'max:255'
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
            'first_name.string' => 'El nombre debe ser una cadena de caracteres.',
            'first_name.min' => 'El nombre debe tener al menos 2 caracteres.',
            'first_name.max' => 'El nombre no debe tener más de 255 caracteres.',
            'last_name.string' => 'El apellido debe ser una cadena de caracteres.',
            'last_name.min' => 'El apellido debe tener al menos 2 caracteres.',
            'last_name.max' => 'El apellido no debe tener más de 255 caracteres.',
            'document_type_id.integer' => 'El tipo de documento debe ser un número entero.',
            'document_type_id.exists' => 'El tipo de documento debe existir en la base de datos.',
            'document_number.string' => 'El número de documento debe ser una cadena de caracteres.',
            'document_number.min' => 'El número de documento debe tener al menos 2 caracteres.',
            'document_number.max' => 'El número de documento no debe tener más de 255 caracteres.',
            'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'phone_number.string' => 'El número de teléfono debe ser una cadena de caracteres.',
            'phone_number.min' => 'El número de teléfono debe tener al menos 2 caracteres.',
            'phone_number.max' => 'El número de teléfono no debe tener más de 255 caracteres.',
            'direction.string' => 'La dirección debe ser una cadena de caracteres.',
            'direction.min' => 'La dirección debe tener al menos 2 caracteres.',
            'direction.max' => 'La dirección no debe tener más de 255 caracteres.'
        ];
    }
}