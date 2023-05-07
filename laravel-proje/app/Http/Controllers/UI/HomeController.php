<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = new User();
        $categories = Category::all()->where("is_active", true);
        $products = Product::all()->where("is_favorite", true);
        return view("ui.home.index", ["categories" => $categories, "user" => $user, "products" => $products]);
    }
}
