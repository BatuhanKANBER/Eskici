<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function index(): View
    {
        $categories = Category::all()->where("is_active", true);
        return view("ui.about_us.index", ["categories" => $categories]);
    }
}
