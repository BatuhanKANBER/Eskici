<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardDetails;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use http\Client\Request;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CreditCardController extends Controller
{
    public function index(): View
    {
        $categories = Category::all()->where("is_active", true);
        $user = new User();
        return view("ui.credit_card.index", ["categories" => $categories, "user" => $user]);
    }
}
