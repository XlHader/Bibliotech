<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;


class StoreDocumentTypeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ]
        ];
    }

    public function message(): array 
    {
        return [
            'name.required' => 'El nombre del documento es requerido.',
            'name.string' => 'El nombre del documento debe de estar en formato de cadena.',
            'name.min' => 'El nombre del documento debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nobre del documento debe tener como máximo 255 caracteres.'
        ];
    }
}
