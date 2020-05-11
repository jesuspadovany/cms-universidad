<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Constants\CourseTypes;
use Illuminate\Validation\Rule;
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

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->nombre),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'precio' => ['required', 'numeric'],
            'image' => ['required', 'image'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['exists:categories,id'],
            'ubicacion' => ['required', 'max:255'],
            'profesor' => ['required', 'string', 'max:255'],
            'duracion' => ['required', 'numeric'],
            'horario' => ['required'],
            'anfitrion' => ['required', 'string', 'max:255'],
            'tipo' => ['required', Rule::in(CourseTypes::getConstantsInArray())],
            'material' => ['nullable','mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf'],
        ];
    }
}
