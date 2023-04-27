<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(User $user): View
    {
        $categories = Category::all()->where("is_active", true);
        $addrs = $user->addrs;
        return view("ui.address.index", ["categories" => $categories, "addrs" => $addrs, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user): View
    {
        $categories = Category::all()->where("is_active", true);
        return view("ui.address.create_address", ["categories" => $categories, "user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request, User $user): RedirectResponse
    {
        $address = new Address();

        $user_id = $request->get("user_id");
        $tittle = $request->get("tittle");
        $city = $request->get("city");
        $district = $request->get("district");
        $zipcode = $request->get("zipcode");
        $address_description = $request->get("address_description");
        $is_default = $request->get("is_default", default: 0);
        $is_default = $is_default == "on" ? 1 : 0;

        $address->user_id = $user_id;
        $address->tittle = $tittle;
        $address->city = $city;
        $address->district = $district;
        $address->zipcode = $zipcode;
        $address->address_description = $address_description;
        $address->is_default = $is_default;
        $address->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(User $user, Address $address): View
    {
        $categories = Category::all()->where("is_active", true);
        $addrs = $user->addrs;
        return view("ui.address.edit_address", ["categories" => $categories, "user" => $user, "address" => $address, "addrs" => $addrs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, User $user, Address $address): RedirectResponse
    {
        $tittle = $request->get("tittle");
        $city = $request->get("city");
        $district = $request->get("district");
        $zipcode = $request->get("zipcode");
        $address_description = $request->get("address_description");
        $is_default = $request->get("is_default", default: 0);
        $is_default = $is_default == "on" ? 1 : 0;

        $address->tittle = $tittle;
        $address->city = $city;
        $address->district = $district;
        $address->zipcode = $zipcode;
        $address->address_description = $address_description;
        $address->is_default = $is_default;
        $address->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @param User $user
     * @return Response
     */
    public function destroy(User $user, Address $address): RedirectResponse
    {
        $address->delete();
        return redirect()->back();
    }

}
