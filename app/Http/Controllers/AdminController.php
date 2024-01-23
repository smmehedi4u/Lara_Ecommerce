<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category',compact('categories'));
    }

    public function add_category(Request $request)
    {
        $data= new category;

        $data->name=$request->category;
        $data->save();

        return redirect()->back()->with('message','Category added succesfully');
    }

    public function delete_category($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successully');
    }

    public function view_product(Request $request)
    {
        $categories = Category::all();
        return view('admin.product',compact('categories'));
    }

    public function add_product(Request $request){
        $product = new Product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->dis_price=$request->dis_price;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();

        return redirect()->back()->with('message','Product Added Successlly');
    }

    public function show_product()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.show_product',compact('products','categories'));
    }

    public function delete_product($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.update_product', compact('product','categories'));
    }

    public function product_update_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->dis_price=$request->dis_price;
        $product->category=$request->category;

        $image=$request->image;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        }
        $product->save();

        return redirect()->back()->with('message','Product Updated Successlly');

    }




}
