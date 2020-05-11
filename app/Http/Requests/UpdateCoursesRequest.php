<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Constants\CourseTypes;
use Illuminate\Validation\Rule;
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
            'nombre' => ['string', 'max:255'],
            'descripcion' => ['string', 'max:255'],
            'precio' => ['numeric'],
            'image' => ['image'],
            'categories' => ['array', 'min:1'],
            'categories.*' => ['exists:categories,id'],
            'ubicacion' => ['max:255'],
            'profesor' => ['string', 'max:255'],
            'duracion' => ['numeric'],
            'horario' => ['required'],
            'anfitrion' => ['string', 'max:255'],
            'tipo' => ['required', Rule::in(CourseTypes::getConstantsInArray())],
            'material' => ['nullable','mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf'],
        ];
    }
}
