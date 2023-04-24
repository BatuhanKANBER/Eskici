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
            return Redirect::to("/");
        } else {
            return redirect()->back()->withErrors(
                [
                    "email" => "Lütfen epostanızı kontrol ediniz.",
                    "password" => "Lütfen şifrenizi kontrol ediniz.",
                ]);
        }
    }

    public function registerShow(): View
    {
        return view("auth.register.register");
    }

    public function register(RegisterRequest $request): RedirectResponse
    {

        $name = $request->get("name");
        $surname = $request->get("surname");
        $email = $request->get("email");
        $password = $request->get("password");

        $user = new User();

        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = false;
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
