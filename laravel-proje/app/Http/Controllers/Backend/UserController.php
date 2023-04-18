<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return view("backend.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.create_user");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
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
        $user->password =Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();

        return Redirect::to("/users");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("backend.users.edit_user", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {

        $name = $request->get("name");
        $surname = $request->get("surname");
        $email = $request->get("email");
        $is_admin = $request->get("is_admin", default: 0);
        $is_active = $request->get("is_active", default: 0);

        $is_admin = $is_admin == "on" ? 1 : 0;
        $is_active = $is_active == "on" ? 1 : 0;

        $user = User::find($id);

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
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::to("/users");
    }

    public function passwordForm(User $user){
            return view("backend.users.password_form",["user"=>$user]);
    }

    public function passwordChange(UserRequest $request, User $user){
        $password = $request->get("password");
        $user->password=Hash::make($password);
        $user->save();
        return Redirect::to("/users");
    }
}
