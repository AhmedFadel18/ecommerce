<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index(){
        if(Auth::id()){
        $data=Category::all();
        return view('admin.category',compact('data'));
        }else{
            return redirect('login');
        }
    }

    public function store(Request $request){
        if(Auth::id()){
            $data=new Category();
            $data->name=$request->name;
            $data->save();

            return redirect()->back()->with('message','Category Added Successfully');  }else{
                return redirect('login');
            }

    }

    public function delete($id){
        if(Auth::id()){

            $data=Category::find($id);
            $data->delete();

            return redirect()->back()->with('message','Category Deleted Successfully');
            }else{
                return redirect('login');
            }

    }
}
