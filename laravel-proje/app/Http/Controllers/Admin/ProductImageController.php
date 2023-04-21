<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Address;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductImageController extends Controller
{


    public function __construct()
    {
        $this->fileRepo = "public/products";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Product $product): View
    {
        return view("admin.images.index", ["product" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product): View
    {
        return view("admin.images.create_image", ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductImageRequest $request, Product $product): RedirectResponse
    {
        $productImage = new ProductImage();
        $data = $this->prepare($request, $productImage->getFillable());
        $productImage->fill($data);
        $productImage->save();


        return Redirect::to("/products/$product->product_id/images");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Product $product, ProductImage $image): View
    {
        return view("admin.images.edit_image", ["product" => $product, "image" => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductImageRequest $request, Product $product, ProductImage $image): RedirectResponse
    {
        $data = $this->prepare($request, $image->getFillable());
        $image->fill($data);
        $image->save();

        return Redirect::to("/products/$product->product_id/images");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @param User $user
     * @return Response
     */
    public function destroy(Product $product, ProductImage $image): RedirectResponse
    {
        $image->delete();
        $filepath = $this->fileRepo . "/" . $image->image_url;
        if (Storage::disk("local")->exists($filepath)) {
            Storage::disk("local")->delete($filepath);
        }
        return Redirect::to("/products/$product->product_id/images");
    }

}
