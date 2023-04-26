<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginShow(): View
    {
        return view("auth.login.login");
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(["email", "password"]);
        $rememberMe = $request->get("remember-me", false);

        if (Auth::attempt($credentials, $rememberMe)) {
            if (auth()->user()->role == "admin") {
                return Redirect::to("users");
            } else if (auth()->user()->role == "user") {
                return Redirect::to("/");
            }
        }
        return redirect()->back()->withErrors(
            [
                "email" => "Lütfen epostanızı kontrol ediniz.",
                "password" => "Lütfen şifrenizi kontrol ediniz.",
            ]);

    }

    public function registerShow(): View
    {
        return view("auth.register.register");
    }

    public function register(RegisterRequest $request): RedirectResponse
    {

        $name = $request->get("name");
        $surname = $request->get("surname");
        $phone_number = $request->get("phone_number");
        $email = $request->get("email");
        $password = $request->get("password");

        $user = new User();

        $user->name = $name;
        $user->surname = $surname;
        $user->phone_number = $phone_number;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = false;
        $user->is_active = true;

        $user->save();
        return Redirect::to("/login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
