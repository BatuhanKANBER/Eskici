<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $users = new User();
        $categories = Category::all()->where("is_active", true);
        return view("ui.home.index", ["categories" => $categories, "users" => $users]);
    }
}
