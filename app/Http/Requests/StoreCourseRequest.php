<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:191'],
            'descripcion_curso' => ['required', 'string', 'max:191'],
            'descripcion' => ['required', 'string', 'max:191'],
            'precio' => ['required', 'numeric'],
            'image' => ['required', 'image'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['exists:categories,id'],
            'ubicacion' => ['required', 'max:191'],
            'profesor' => ['required', 'string', 'max:191'],
            'duracion' => ['required', 'numeric'],
            'horario' => ['required'],
            'anfitrion' => ['required', 'string', 'max:191'],
            'clase' => ['required'],
            'material' => ['nullable','mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf'],
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre'
        ];
    }
}
