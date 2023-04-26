<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $categories = Category::all()->where("is_active", true);
        $user = Auth::user();
        return view("ui.profile.index", ["user" => $user, "categories" => $categories]);
    }

    public function edit(User $user)
    {
        $categories = Category::all()->where("is_active", true);
        $userIn = Auth::user();
        return view("ui.profile.edit_profile", ["user" => $user, "categories" => $categories, "userIn" => $userIn]);
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $name = $request->get("name");
        $surname = $request->get("surname");
        $phone_number = $request->get("phone_number");
        //$is_active = $request->get("is_active", default: 0);

        //$is_active = $is_active == "on" ? 1 : 0;

        $user->name = $name;
        $user->surname = $surname;
        $user->phone_number = $phone_number;
        //$user->is_active = $is_active;

        $user->save();
        return redirect()->back();
    }
}
