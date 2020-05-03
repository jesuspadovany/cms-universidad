<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'is_available_online' => $this->is_available_online === 'si' ? true : false,
            'is_free' => $this->is_free === 'si' ? true : false,
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
            'title' => ['required', 'string', 'max:255', 'unique:books'],
            'slug' => ['unique:books', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'is_free' => ['required'],
            'price' => [Rule::requiredIf(! $this->input('is_free')), 'nullable', 'numeric', 'min:1'],
            'author' => ['required', 'string', 'max:255'],
            'num_of_pages' => ['required', 'integer', 'min:1'],
            'published_at' => ['required', 'before:today'],
            'image' => ['required', 'image'],
            'is_available_online' => ['required'],
            'location' => [Rule::requiredIf(! $this->input('is_available_online')), 'nullable', 'string', 'max:255'],
            'file' => [Rule::requiredIf($this->input('is_available_online')), 'nullable', 'file'],
            'categories' => ['array', 'min:1'],
            'categories.*' => ['required', 'exists:categories,id'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'description' => 'descripción',
            'image' => 'imagen',
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
            'is_available_online.required' => 'Debe indicar si el libro está disponible online o no',
            'is_free' => 'Debe indicar si el libro es gratuito o no',
            'slug.max' => 'El título es muy largo'
        ];
    }

    public function getBookData()
    {
        return $this->only([
            'title',
            'slug',
            'description',
            'is_free',
            'price',
            'author',
            'num_of_pages',
            'published_at',
            'image',
            'is_available_online',
            'location',
            'file',
        ]);
    }
}
