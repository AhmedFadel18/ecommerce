<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user()->id;
            $product = Product::find($id);
            $productExists = Cart::where(['user_id' => $user, 'product_id' => $id])->get('id')->first();
            if ($productExists) {
                $cart = Cart::find($productExists)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if ($product->discount != null) {
                    $cart->price = $product->discount * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
                $cart->save();
                return redirect()->back()->with('message', 'Product Quantity Changed Successfully');
            } else {
                $cart = new Cart;
                $cart->user_id = $user;
                $cart->product_id = $id;
                $cart->quantity = $request->quantity;
                if ($product->discount != null) {
                    $cart->price = $product->discount * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }

                $cart->product_title = $product->title;
                $cart->product_image = $product->image;

                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');
}
        } else {
            return redirect('login');
        }
    }

    public function show()
    {
        if (Auth::id()) {
            $user = Auth::user()->id;
            $cart=Cart::where('user_id',$user)->get();

            return view('home.cart.show', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function delete($id)
    {
        $item=Cart::find($id);
        $item->delete();
        return redirect()->back();
    }
}
