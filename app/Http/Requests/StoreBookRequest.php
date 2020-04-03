<?php

namespace App\Http\Requests;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'categories' => ['array', 'min:1'],
            'categories.*' => ['required', 'exists:categories,id'],
            'sell_type' => ['in:gratuito,pago'],
            'price' => ['required_if:sell_type,pago', 'nullable', 'numeric', 'min:1']
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'description' => 'descripción',
            'image' => 'imagen',
            'categories' => 'categorias',
            'categories.*' => 'id de categoria',
            'sell_type' => 'tipo de venta',
            'price' => 'precio',
        ];
    }

    public function getBookData()
    {
        $tempData =  $this->only([
            'title',
            'description',
            'image',
            'price',
        ]);

        $tempData['is_free'] = $this->input('sell_type') === 'gratuito' ? true : false;

        return $tempData;
    }
}
