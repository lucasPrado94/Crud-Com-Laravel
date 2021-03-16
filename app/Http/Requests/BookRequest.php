<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required',
            'pages' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ó título do livro é obrigatório',
            'pages.required' => 'O número de páginas é obrigatório',
            'pages.numeric' => 'Número de páginas deve ser numérico'
        ];
    }
}
