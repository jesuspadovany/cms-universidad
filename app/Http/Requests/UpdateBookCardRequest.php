<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookCardRequest extends FormRequest
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
            'short_description' => ['nullable', 'string', 'max:255'],
            'short_text' => ['nullable', 'string', 'max:255'],
            'long_description' => ['required', 'max:1000']
        ];
    }

    public function attributes()
    {
        return [
            'short_description' => 'descripción corta',
            'short_text' => 'texto corto',
            'long_description' => 'descripción larga',
        ];
    }
}
