<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = Order::create([
            'id' => 1,
            'user_id' => 1 ,
            'status' => 'pending',
        ]);
        $product = Product::find(1);
        $order_detail = OrderDetails::create([
            'id' => 1 ,
            'product_id' => $product->id,
            'order_id' => $order->id,
            'quantity' => 2,
        ]);
        $order->order_total = $order_detail->quantity *  $product->price;
        $order->update();
    }
}
