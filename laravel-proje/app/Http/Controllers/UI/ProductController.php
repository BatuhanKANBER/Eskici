<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index($categorySlug = ""): View
    {
        if (Str::of($categorySlug)->isNotEmpty()) {
            $selectedCategory = Category::all()->where("is_active", true)->where("slug", $categorySlug)->first();
            $products = $selectedCategory->products;
        } else {
            $products = Product::all()->where("is_active", true);
        }
        $categories = Category::all()->where("is_active", true);
        return view("ui.products.index", ["categories" => $categories, "products" => $products]);
    }
}
