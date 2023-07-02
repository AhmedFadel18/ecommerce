<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersPanelController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $order = Order::all();
            return view('admin.orders.index', compact('order'));
        } else {
            return redirect('login');
        }
    }

    public function delivered($id)
    {
        if (Auth::id()) {
            $order = Order::find($id);
            $order->delivery_status = 'delivered';
            $order->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function print($id)
    {
        if (Auth::id()) {

            $order = Order::find($id);
            $pdf = PDF::loadView('admin.orders.pdf', compact('order'));
            return $pdf->download('order_details.pdf');
        } else {
            return redirect('login');
        }
    }
    public function search(Request $request)
    {
        if (Auth::id()) {

            $searchText = $request->search;
            $order = Order::where('name', 'like', "%$searchText%")->orWhere('phone', 'like', "%$searchText%")
                ->orWhere('product_title', 'like', "%$searchText%")->orWhere('delivery_status', 'like', "%$searchText%")->get();
            return view('admin.orders.index', compact('order'));
        } else {
            return redirect('login');
        }
    }
}
