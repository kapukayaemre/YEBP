<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'              => ['required','max:255'],
            'slug'              => ['max:255'],
            'description'       => ['max:255'],
            'seo_keywords'      => ['max:255'],
            'seo_description'   => ['max:255'],
            "image"             => ["image", "mimes:png,jpeg,jpg", "nullable", "max:2048"],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kategori Adı Alanı Zorunludur',
            'name.max'  => 'Kategori Adı Alanı En Fazla 255 Karakterden Oluşabilir',
            'description.max'  => 'Kategori Açıklama Alanı En Fazla 255 Karakterden Oluşabilir',
            'seo_keywords.max'  => 'Kategori Seo Keywords Alanı En Fazla 255 Karakterden Oluşabilir',
            'seo_description.max'  => 'Kategori Seo Description Alanı En Fazla 255 Karakterden Oluşabilir'
        ];
    }
}
