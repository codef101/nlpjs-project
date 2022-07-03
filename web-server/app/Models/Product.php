<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'unit',
        'price',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
