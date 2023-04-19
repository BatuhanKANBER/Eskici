<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        $user_id=$this->request->get("user_id");
        return [
            "user_id" => "required|numeric",
            "city" => "required|min:3",
            "district" => "required|min:3",
            "zipcode" => "required|numeric|min:4",
            "address" => "required|min:20"
        ];
    }

    public  function messages()
    {
        return [
            "user_id.required" => "Bu alan zorunludur.",
            "user_id.numeric" => "Bu alan sayısal olmak zorunda.",
            "city.required" => "Bu alan zorunludur.",
            "city.min" => "Bu alan en az 3 karakter olmalıdır.",
            "district.required" => "Bu alan zorunludur.",
            "district.min" => "Bu alan en az 3 karakter olmalıdır.",
            "zipcode.required" => "Bu alan zorunludur.",
            "zipcode.numeric" => "Bu alan sayısal ve en az 4 karakter olmak zorunda.",
            "address.required" => "Bu alan zorunludur.",
            "address.numeric" => "Bu alan en az 20 karakter olmak zorunda.",
        ];
    }
}
