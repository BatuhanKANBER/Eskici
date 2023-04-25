<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\CardDetails;
use App\Models\Category;
use App\Models\Product;
use http\Client\Request;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CardController extends Controller
{
    public function index(): View
    {
        $card = $this->getOrCreateCart();
        $categories = Category::all()->where("is_active", true);
        return view("ui.card.index", ["card" => $card, "categories" => $categories]);
    }

    /**
     *
     * Lists the cart content
     *
     * @return Card
     */
    private function getOrCreateCart(): Card
    {
        $user = Auth::user();
        $card = Card::firstOrCreate(
            ['user_id' => $user->user_id],
            ['code' => Str::random(8)]
        );
        return $card;
    }

    /**
     * Add product as cart detail
     *
     * @param Product $product
     * @param int $quantity
     * @return RedirectResponse
     */
    public function add(Product $product, int $quantity = 1): RedirectResponse
    {
        $card = $this->getOrCreateCart();
        $card->details()->create([
            "product_id" => $product->product_id,
            "quantity" => $quantity,
        ]);
        return back();
    }

    /**
     *
     * Remove cart detail from cart
     *
     * @param CardDetails $cardDetails
     * @return RedirectResponse
     */
    public function remove(CardDetails $cardDetails): RedirectResponse
    {
        $cardDetails->delete();
        return back();
    }
}
