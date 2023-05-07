<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Psy\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $products = Product::all();
        return view("admin.products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = Category::all();
        return view("admin.products.create_product", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(ProductRequest $request): RedirectResponse
    {

        $name = $request->get("name");
        $category_id = $request->get("category_id");
        $price = $request->get("price");
        $old_price = $request->get("old_price");
        $lead = $request->get("lead");
        $description = $request->get("description");
        $slug = $request->get("slug");
        $is_active = $request->get("is_active", default: 0);
        $is_favorite = $request->get("is_favorite", default: 0);

        $is_active = $is_active == "on" ? 1 : 0;
        $is_favorite = $is_favorite == "on" ? 1 : 0;

        $product = new Product();
        $product->name = $name;
        $product->category_id = $category_id;
        $product->price = $price;
        $product->old_price = $old_price;
        $product->lead = $lead;
        $product->description = $description;
        $product->slug = $slug;
        $product->is_active = $is_active;
        $product->is_favorite = $is_favorite;
        $product->save();

        return Redirect::to("/products");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        $categories = Category::all();
        return view("admin.products.edit_product", ["product" => $product, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $name = $request->get("name");
        $category_id = $request->get("category_id");
        $price = $request->get("price");
        $old_price = $request->get("old_price");
        $lead = $request->get("lead");
        $description = $request->get("description");
        $slug = $request->get("slug");
        $is_active = $request->get("is_active", default: 0);
        $is_favorite = $request->get("is_favorite", default: 0);

        $is_active = $is_active == "on" ? 1 : 0;
        $is_favorite = $is_favorite == "on" ? 1 : 0;

        $product->name = $name;
        $product->category_id = $category_id;
        $product->price = $price;
        $product->old_price = $old_price;
        $product->lead = $lead;
        $product->description = $description;
        $product->slug = $slug;
        $product->is_active = $is_active;
        $product->is_favorite = $is_favorite;
        $product->save();

        return Redirect::to("/products");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return Redirect::to("/products");
    }
}
