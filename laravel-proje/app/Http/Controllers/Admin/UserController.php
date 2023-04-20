<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->returnUrl = "/users";
    }

    public function index():View
    {
        $users = User::all();
        return view("admin.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view("admin.users.create_user");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request):RedirectResponse
    {

        $name = $request->get("name");
        $surname = $request->get("surname");
        $email = $request->get("email");
        $password = $request->get("password");
        $is_admin = $request->get("is_admin", default: 0);
        $is_active = $request->get("is_active", default: 0);

        $is_admin = $is_admin == "on" ? 1 : 0;
        $is_active = $is_active == "on" ? 1 : 0;

        $user = new User();

        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();

        return Redirect::to("/users");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user):View
    {
        return view("admin.users.edit_user", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UserRequest $request, User $user):RedirectResponse
    {

        $name = $request->get("name");
        $surname = $request->get("surname");
        $email = $request->get("email");
        $is_admin = $request->get("is_admin", default: 0);
        $is_active = $request->get("is_active", default: 0);

        $is_admin = $is_admin == "on" ? 1 : 0;
        $is_active = $is_active == "on" ? 1 : 0;

        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();
        return Redirect::to("/users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user):RedirectResponse
    {
        $user->delete();
        return Redirect::to("/users");
    }

    public function passwordForm(User $user)
    {
        return view("admin.users.password_form", ["user" => $user]);
    }

    public function passwordChange(UserRequest $request, User $user)
    {
        $password = $request->get("password");
        $user->password = Hash::make($password);
        $user->save();
        return Redirect::to("/users");
    }
}
