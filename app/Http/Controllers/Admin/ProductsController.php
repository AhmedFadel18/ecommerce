<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\Path\Move;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.products.create', compact('category'));
    }

    public function store(Request $request)
    {
        if (Auth::id()) {
            $request->validate([
                'title'=>'required',
                'description'=>'required',
                'image'=>'required',
                'category'=>'required',
                'price'=>'required',
            ],[
                'title.required'=>'Enter product title',
                'image.required'=>'Enter product image',
                'description.required'=>'Enter product description',
                'category.required'=>'Enter product category',
                'price.required'=>'Enter product price',
            ]);
            $data = new Product();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->discount = $request->discount;
            $data->category = $request->category;

            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('images/products/', $imageName);

            $data->image = $imageName;

            $data->save();

            return redirect()->back()->with('message', 'Product Added Successfully');
        } else {
            return redirect('login');
        }
    }

    public function edit($id)
    {
        if (Auth::id()) {

            $product = Product::find($id);
            $category = Category::all();
            return view('admin.products.edit', compact('category', 'product'));
        } else {
            return redirect('login');
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::id()) {

            $product = Product::find($id);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->category = $request->category;

            if ($request->hasFile('image')) {
                $path = 'images/products/' . $product->image;
                if (File::exists($path)) {
                    File::delete($path);
                }

                $image = $request->image;
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('images/products/', $imageName);
                $product->image = $imageName;
            }
            $product->update();

            return redirect()->back()->with('message', 'Product Updated Successfully');
        } else {
            return redirect('login');
        }
    }

    public function delete($id)
    {
        if (Auth::id()) {

            $product = Product::find($id);
            $product->delete();

            return redirect()->back()->with('message', 'Product Deleted Successfully');
        } else {
            return redirect('login');
        }
    }

    public function search(Request $request)
    {
        if (Auth::id()) {

            $search_text = $request->search;
            $product = Product::where('title', 'LIKE', "%$search_text%")->paginate(10);

            return view('home.products', compact('product'));
        } else {
            return redirect('login');
        }
    }
}
