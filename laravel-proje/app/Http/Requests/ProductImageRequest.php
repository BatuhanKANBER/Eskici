<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductImageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "product_id" => "required|numeric",
            "image_url" => "required|image|sometimes",
        ];
    }

    public function messages()
    {
        return [
            "product_id.required" => "Bu alan zorunludur.",
            "product_id.numeric" => "Bu alan sayısal olmak zorundadır.",
            "image_url.required" => "Bu alan zorunludur.",
            "image_url.image" => "Sadece .jpg, .jpeg, .png uzantılı dosyalar yüklenebilir.",
        ];
    }
}
