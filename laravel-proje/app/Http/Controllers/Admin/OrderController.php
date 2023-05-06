<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $orders = Order::all();
        return \view("admin.order.index", ["orders" => $orders]);
    }

    public function orderView($id)
    {
        $orders = Order::where('order_id', $id)->first();
        return view("admin.order.update_status", compact('orders'));
    }

    public function update_status(Request $request, $id)
    {
        $orders = Order::findorfail($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('/orders')->with('status', 'Order updated successfully');
    }
}
