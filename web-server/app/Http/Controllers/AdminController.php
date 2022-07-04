<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::count();
        $users = User::count();
        $products = Product::count();

        return view('admin.dashboard',[
            'orders' => $orders,
            'users' =>$users,
            'products' => $products,
        ]);
    }
    public function knowledge()
    {
        return view('admin.knowledge');
    }

    public function update_corpus(Request $request)
    {
        return view('admin.knowledge');
    }
}
