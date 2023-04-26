<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $user = new User();
        $categories = Category::all()->where("is_active", true);
        return view("ui.contact.index", ["categories" => $categories, "user" => $user]);
    }
}
