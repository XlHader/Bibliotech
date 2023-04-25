<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreBookRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'author' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'number_pages' => [
                'required',
                'integer',
                'min:1'
            ],
            'icon' => [
                'sometimes',
                'string',
                'url'
            ],
            'isbn_code' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'is_avaible' => [
                'sometimes',
                'boolean'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es requerido.',
            'title.string' => 'El título debe ser una cadena de caracteres.',
            'title.max' => 'El título no debe exceder los 255 caracteres.',
            'author.required' => 'El autor es requerido.',
            'author.string' => 'El autor debe ser una cadena de caracteres.',
            'author.max' => 'El autor no debe exceder los 255 caracteres.',
            'number_pages.required' => 'El número de páginas es requerido.',
            'number_pages.integer' => 'El número de páginas debe ser un número entero.',
            'number_pages.min' => 'El número de páginas debe ser mayor a 0.',
            'icon.string' => 'El ícono debe ser una URL.',
            'isbn_code.required' => 'El código ISBN es requerido.',
            'isbn_code.string' => 'El código ISBN debe ser una cadena de caracteres.',
            'isbn_code.max' => 'El código ISBN no debe exceder los 255 caracteres.',
            'category_id.required' => 'La categoría es requerida.',
            'category_id.integer' => 'La categoría debe ser un número entero.',
            'category_id.exists' => 'La categoría no existe.',
            'is_avaible.boolean' => 'El campo de disponibilidad debe ser un booleano.'
        ];
    }
}