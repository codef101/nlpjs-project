<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function shopping()
    {
        $order_details = OrderDetails::join('orders', 'orders.id', '=', 'order_details.order_id')->join('products', 'products.id', '=', 'order_details.product_id')->where('user_id', '=', Auth::user()->id)->get();
        return view('shopping',['orders' => $order_details]);
    }
}
