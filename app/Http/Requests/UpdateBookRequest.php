<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'is_electronic' => $this->is_electronic === 'si' ? true : false,
            'file' => $this->is_electronic === 'si' ? $this->file : null,
            'is_free' => $this->is_free === 'si' ? true : false,
            'price' => $this->is_free === 'si' ? null : $this->price,
            'slug' => Str::slug($this->title)
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
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['max:255'],
            'synopsis' => ['required', 'string', 'max:1000'],
            'is_free' => ['required'],
            'price' => [Rule::requiredIf(! $this->is_free), 'nullable', 'numeric', 'min:1'],
            'author' => ['required', 'string', 'max:255'],
            'num_of_pages' => ['required', 'integer', 'min:1'],
            'published_at' => ['required', 'before:today'],
            'is_electronic' => ['required'],
            'location' => [Rule::requiredIf(! $this->is_electronic), 'nullable', 'string', 'max:255'],
            'file' => [Rule::requiredIf($this->is_electronic), 'nullable', 'file', 'mimes:pdf'],
            'categories' => ['array', 'min:1'],
            'categories.*' => ['required', 'exists:categories,id'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'synopsis' => 'sinopsis',
            'price' => 'precio',
            'author' => 'autor',
            'num_of_pages' => 'número de páginas',
            'published_at' => 'fecha de publicación',
            'location' => 'ubicación',
            'file' => 'archivo',
            'categories' => 'categorias',
            'categories.*' => 'id de categoria',
        ];
    }

    public function messages()
    {
        return [
            'is_electronic.required' => 'Debe indicar si el libro electrónico o no',
            'is_free' => 'Debe indicar si el libro es gratuito o no',
            'slug.max' => 'El título es muy largo'
        ];
    }

    public function getBookData()
    {
        return Arr::except($this->validated(), 'categories');
    }
}
