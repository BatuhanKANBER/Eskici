<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\CategoryImageRequest;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\CategoryImage;
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

class CategoryImageController extends Controller
{


    public function __construct()
    {
        $this->fileRepo = "public/categories";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Category $category): View
    {
        return view("admin.category_images.index", ["category" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category): View
    {
        return view("admin.category_images.create_image", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryImageRequest $request, Category $category): RedirectResponse
    {
        $categoryImage = new CategoryImage();
        $data = $this->prepare($request, $categoryImage->getFillable());
        $categoryImage->fill($data);
        $categoryImage->save();


        return Redirect::to("/categories/$category->category_id/category_images");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Category $category, CategoryImage $categoryImage): View
    {
        return view("admin.category_images.edit_image", ["category" => $category, "categoryImage" => $categoryImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryImageRequest $request, Category $category, CategoryImage $categoryImage): RedirectResponse
    {
        $data = $this->prepare($request, $categoryImage->getFillable());
        $categoryImage->fill($data);
        $categoryImage->save();

        return Redirect::to("/categories/$category->category_id/category_images");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @param User $user
     * @return Response
     */
    public function destroy(Category $category, CategoryImage $categoryImage): RedirectResponse
    {
        $categoryImage->delete();
        $filepath = $this->fileRepo . "/" . $categoryImage->image_url;
        if (Storage::disk("local")->exists($filepath)) {
            Storage::disk("local")->delete($filepath);
        }
        return Redirect::to("/categories/$category->category_id/category_images");
    }

}
