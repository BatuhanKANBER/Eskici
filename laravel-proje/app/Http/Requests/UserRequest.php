<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user_id = $this->request->get("user_id");
        return [
            "name" => "required|sometimes|min:3",
            "surname" => "required|sometimes|min:2",
            "email" => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            "password" => "required|sometimes|string|min:6|confirmed",
            "phone_number" => 'required|sometimes|numeric|min:10'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan zorunludur.",
            "name.min" => "Ad alanı en az 3 karakterden oluşmalıdır.",
            "surname.required" => "Bu alan zorunludur.",
            "surname.min" => "Soyad alanı en az 2 karakterden oluşmalıdır.",
            "phone_number.required" => "Bu alan zorunludur.",
            "phone_number.min" => "Bu alan numara formatına uygun olmalıdır.",
            "email.required" => "Bu alan zorunludur.",
            "email.email" => "Girdiğiniz değer eposta formatına uygun olmalıdır.",
            "email.unique" => "Girdiğiniz eposta sistemde başka bir kullanıcı tarafından kullanılıyor",
            "password.required" => "Bu alan zorunludur.",
            "password.min" => "En az 6 karakterden oluşmalıdır.",
            "password.confirmed" => "Girilen şifreler uyuşmuyor.",
        ];
    }

}
