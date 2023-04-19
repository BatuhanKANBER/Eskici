<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AddressController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/users/{}/addresses";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\http\Client\Curl\User $user)
    {
        $addrs = $user->addrs;
        return view("admin.address.index", ["users" => $addrs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view("admin.address.create_address", ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request, User $user): RedirectResponse
    {
        $city = $request->get("city");
        $district = $request->get("district");
        $zipcode = $request->get("zipcode");
        $address = $request->get("address");
        $is_default = $request->get("is_default", default: 0);

        $is_default = $is_default == "on" ? 1 : 0;

        $addrs = new Address();
        $addrs->city = $city;
        $addrs->district = $district;
        $addrs->zipcode = $zipcode;
        $addrs->address = $address;
        $addrs->is_default = $is_default;
        $addrs->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Address $address): View
    {
        return view("admin.users.edit_address", ["user" => $user, "address" => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, Address $addrs, User $user): RedirectResponse
    {
        $city = $request->get("city");
        $district = $request->get("district");
        $zipcode = $request->get("zipcode");
        $address = $request->get("address");
        $is_default = $request->get("is_default", default: 0);

        $is_default = $is_default == "on" ? 1 : 0;

        $addrs->city = $city;
        $addrs->district = $district;
        $addrs->zipcode = $zipcode;
        $addrs->address = $address;
        $addrs->is_default = $is_default;
        $addrs->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $addrs): RedirectResponse
    {
        $addrs->delete();
        return Redirect::to($this->returnUrl);
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "users/$id/addresses";
    }
}
