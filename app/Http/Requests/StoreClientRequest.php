<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreClientRequest extends BaseRequest
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
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'document_type_id' => [
                'required',
                'integer',
                'exists:document_types,id'
            ],
            'document_number' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'unique:clients,document_number'
            ],
            'birth_date' => [
                'required',
                'date'
            ],
            'phone_number' => [
                'nullable',
                'string',
                'max:255'
            ],
            'direction' => [
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'El nombre es requerido',
            'first_name.string' => 'El nombre debe ser una cadena de caracteres',
            'first_name.min' => 'El nombre debe tener al menos 2 caracteres',
            'first_name.max' => 'El nombre no debe exceder los 255 caracteres',
            'last_name.required' => 'El apellido es requerido',
            'last_name.string' => 'El apellido debe ser una cadena de caracteres',
            'last_name.min' => 'El apellido debe tener al menos 2 caracteres',
            'last_name.max' => 'El apellido no debe exceder los 255 caracteres',
            'document_type_id.required' => 'El tipo de documento es requerido',
            'document_type_id.integer' => 'El tipo de documento debe ser un número entero',
            'document_type_id.exists' => 'El tipo de documento no existe',
            'document_number.required' => 'El número de documento es requerido',
            'document_number.string' => 'El número de documento debe ser una cadena de caracteres',
            'document_number.min' => 'El número de documento debe tener al menos 2 caracteres',
            'document_number.max' => 'El número de documento no debe exceder los 255 caracteres',
            'document_number.unique' => 'El número de documento ya está en uso',
            'birth_date.required' => 'La fecha de nacimiento es requerida',
            'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'phone_number.string' => 'El número de teléfono debe ser una cadena de caracteres',
            'phone_number.max' => 'El número de teléfono no debe exceder los 255 caracteres',
            'direction.string' => 'La dirección debe ser una cadena de caracteres',
            'direction.max' => 'La dirección no debe exceder los 255 caracteres'
        ];
    }
}