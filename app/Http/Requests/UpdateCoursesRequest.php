<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoursesRequest extends FormRequest
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
            'nombre' => ['string', 'max:191'],
            'descripcion_curso' => ['string', 'max:191'],
            'descripcion' => ['string', 'max:191'],
            'precio' => ['numeric'],
            'image' => ['image'],
            'categories' => ['array', 'min:1'],
            'categories.*' => ['exists:categories,id'],
            'ubicacion' => ['max:191'],
            'profesor' => ['string', 'max:191'],
            'duracion' => ['numeric'],
            'horario' => ['required'],
            'anfitrion' => ['string', 'max:191'],
            'clase' => [],
            'material' => ['nullable','mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf'],
        ];
    }
}
