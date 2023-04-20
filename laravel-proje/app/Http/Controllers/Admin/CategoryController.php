<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Psy\Util\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $categories = Category::all();
        return view("admin.categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view("admin.categories.create_category");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request): RedirectResponse
    {

        $name = $request->get("name");
        $slug = $request->get("slug");
        $is_active = $request->get("is_active", default: 0);

        $is_active = $is_active == "on" ? 1 : 0;

        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;
        $category->is_active = $is_active;
        $category->save();

        return Redirect::to("/categories");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category): View
    {
        return view("admin.categories.edit_category", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $name = $request->get("name");
        $slug = $request->get("slug");
        $is_active = $request->get("is_active", default: 0);

        $is_active = $is_active == "on" ? 1 : 0;

        $category->name = $name;
        $category->slug = $slug;
        $category->is_active = $is_active;
        $category->save();

        return Redirect::to("/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return Redirect::to("/categories");
    }
}
