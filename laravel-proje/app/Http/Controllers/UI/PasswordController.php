<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\User;
use http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function index(User $user): View
    {
        $categories = Category::all()->where("is_active", true);
        $userIn = Auth::user();
        return view("ui.profile.password_change", ["userIn" => $userIn, "user" => $user, "categories" => $categories]);
    }

    public function updatePassword(UserRequest $request, User $user): RedirectResponse
    {
        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Girmiş olduğunuz parola mevcut parola ile eşleşmedi!");
        }


        #Update the new Password
        $password = $request->get("password");
        $user->password = Hash::make($password);
        $user->save();

        return back()->with("status", "Parolanız güncellendi!");
    }
}
