<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id','desc')->get();
        return view('backend.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_name = $request->category;
        $product->brand_name = $request->brand;
        $product->description = $request->description;
        $product->status = $request->status;

        if($request->image){
            $image = $request->file('image');
            $nameCustom = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/productimages/'.$nameCustom);
            $check = Image::make($image)->save($location);
            $product->image = 'backend/productimages/'.$nameCustom;
        }

        $product->save();
        return redirect()->route('manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct()
    {
        $products = Product::all();
        return view('frontend.home',compact('products'));
    }
    
    public function show($id)
    {
        $product = Product::find($id);
        return view('frontend.singleProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_name = $request->category;
        $product->brand_name = $request->brand;
        $product->description = $request->description;
        $product->status = $request->status;

        if(!empty($request->image)){
            if(File::exists($product->image)){
                File::delete($product->image);
            }
            $image = $request->file('image');
            $nameCustom = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('backend/productimages/'.$nameCustom);
            $check = Image::make($image)->save($location);
            $product->image = 'backend/productimages/'.$nameCustom;
        }

        $product->update();
        return redirect()->route('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete($product->image);
        $product->delete();
        return redirect()->route('manage');
    }
}
