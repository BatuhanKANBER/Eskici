<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\User;
use Illuminate\View\View;

class FaqsController extends Controller
{
    public function index(): View
    {
        $user = new User();
        $categories = Category::all()->where("is_active", true);
        $faqs = Faq::all();
        return view("ui.faqs.index", ["categories" => $categories, "faqs" => $faqs, "user" => $user]);
    }
}
