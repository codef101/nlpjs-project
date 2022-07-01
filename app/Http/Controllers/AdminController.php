<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders',['orders' => $orders]);
    }
    public function products()
    {
        return view('admin.products');
    }
    public function knowledge()
    {
        return view('admin.knowledge');
    }
}
