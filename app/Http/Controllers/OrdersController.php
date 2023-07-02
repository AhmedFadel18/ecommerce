<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function make_order()
    {
        $user = auth()->user()->id;
        $cart = Cart::where(['user_id' => $user])->get();

        $order = new Order();
        $order->user_id = $user;
        $order->price = 0;
        $order->save();
        $price = 0;
        foreach ($cart as $cart) {
            $order->products()->attach($cart->product_id, ['quantity' => $cart->quantity]);
            $price += $cart->price;
        }
        $order->price = $price;
        $order->update();

        Cart::where('user_id', $user)->delete();

        return redirect()->back();
    }


    public function show()
    {
        if (Auth::id()) {
            $user_id = auth()->user()->id;
            $order = Order::where(['user_id' => $user_id])->with('products')->orderBy('id','DESC')->get();
            $cart = Cart::where(['user_id' => $user_id])->get();

            return view('home.order', compact('order', 'cart'));
        } else {
            return redirect('login');
        }
    }
}
