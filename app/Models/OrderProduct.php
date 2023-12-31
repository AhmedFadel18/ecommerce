<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_product';

    public function orders (){
        return $this -> belongsTo(Order::class);
    }

    public function product (){
        return $this ->hasMany(Product::class);
    }
}
