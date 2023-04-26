<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreLoanRequest extends BaseRequest
{
    public function prepareForValidation() {
        $this->merge([
            'books_ids' => json_decode($this->books_ids, true)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => [
                'required',
                'integer',
                'exists:clients,id',
                'max_unreturned_loans:3',
                'max_late_refunds:3'
            ],
            'books_ids' => [
                'required',
                'array',
                'min:1',
                'max:3',
            ],
            'books_ids.*' => [
                'exists:books,id',
                'distinct'
            ],
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
            'client_id.required' => 'El campo :attribute es requerido',
            'client_id.exists' => 'El campo :attribute no existe',
            'client_id.max_unreturned_loans' => 'El cliente tiene 3 o más préstamos sin devolver',
            'client_id.max_late_refunds' => 'El cliente tiene 3 o más devoluciones atrasadas',
            'books_ids.required' => 'El campo :attribute es requerido',
            'books_ids.array' => 'El campo :attribute debe ser un arreglo',
            'books_ids.min' => 'El campo :attribute debe tener al menos un elemento',
            'books_ids.max' => 'El campo :attribute debe tener como máximo 3 elementos',
            'books_ids.*.exists' => 'El campo :attribute contiene el elemento ":input" que no existe.',
            'books_ids.*.distinct' => 'El campo :input se encuentra duplicado.',
        ];
    }
}