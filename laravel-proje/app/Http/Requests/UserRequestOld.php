<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestOld extends FormRequest
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
            "name" => "required|min:3",
            "surname" => "required|min:3",
            "email" => "required|email|unique:App\Models\User,email,$user_id",
            "password" => "required|sometimes|string|min:6|confirmed"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan zorunludur.",
            "name.min" => "Ad alanı en az 3 karakterden oluşmalıdır.",
            "surname.required" => "Bu alan zorunludur.",
            "surname.min" => "Soyad alanı en az 3 karakterden oluşmalıdır.",
            "email.required" => "Bu alanı zorunludur.",
            "email.email" => "Girdiğiniz değer eposta formatına uygun olmalıdır.",
            "password.required" => "Bu alan zorunludur.",
            "password.min" => "En az 5 karakterden oluşmalıdır.",
            "password.confirmed" => "Girilen şifreler uyuşmuyor.",
            "password_confirmation.required" => "Bu alan zorunludur.",
            "password_confirmation.min" => "En az 6 karakterden oluşmalıdır.",
            "password_confirmation.confirmed" => "Girilen şifreler uyuşmuyor.",
        ];
    }
}
