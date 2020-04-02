<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideRequest extends FormRequest
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
            'image' => ['required', 'image'],
            'position' => ['required', 'min:1'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'slides_positions' => ['array'],
            'slides_positions.*.id' => ['required', 'exists:slides,id'],
            'slides_positions.*.position' => ['required', 'integer'],
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'imagen',
            'position' => 'pocisión',
            'title' => 'título',
            'description' => 'descripción',
            'slides_positions' => 'posiciones de los slides',
            'slides_positions.*.id' => "id del slide",
            'slides_positions.*.position' => "pocisión del slide",
        ];
    }

    public function getSlideData()
    {
        return $this->only([
            'image',
            'position',
            'title',
            'description'
        ]);
    }
}
