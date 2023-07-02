<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == '1') {
                $total_orders = Order::all()->count();
                $total_products = Product::all()->count();
                $total_customers = User::all()->count();
                $orders = Order::all();
                $total_revenue = 0;
                foreach ($orders as $order) {
                    $total_revenue += $order->price;
                }

                return view('admin.home', compact('total_orders', 'total_products', 'total_customers', 'total_revenue'));
            } else {
                $product = Product::paginate(10);

                return view('home.userpage', compact('product'));
            }
        } else {
            return redirect('login');
        }
    }
    public function index()
    {
        $product = Product::paginate(10);
        return view('home.userpage', compact('product'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('home.show', compact('product'));
    }


    public function show_products()
    {
        $product = Product::paginate(10);

        return view('home.products', compact('product'));
    }
}
