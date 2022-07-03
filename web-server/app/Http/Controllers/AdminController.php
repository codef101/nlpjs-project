<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function knowledge()
    {
        return view('admin.knowledge');
    }

    public function update_corpus(Request $request)
    {

    }
}
