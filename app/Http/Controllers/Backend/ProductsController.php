<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Image;


class ProductsController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->get();
        return view('backend.pages.product.index')->with('products', $products);
    }

    public function create(){
        return view('backend.pages.product.create');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('backend.pages.product.edit')->with('product', $product);
    }

    public function delete($id){
        $product = Product::find($id);
            if(!is_null($product)){
                $product->delete();
            }

            session()->flash('success','product has deleted successfully');
            return  redirect()->route('admin.products');

    }


    public function update( Request $request , $id){


        $request->validate([
            'title' => 'required|max:155',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            
        ]);


        $product = Product::find($id);
        $product->title= $request->title;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->quantity= $request->quantity;

        $product->category_id =1;
        $product->brand_id =1;
        $product->admin_id =1;
        $product->slug = $request->title;
        $product->save();

      

        return  redirect()->route('admin.products');
       
    }
    
    
    public function store( Request $request){


        $request->validate([
            'title' => 'required|max:155',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            
        ]);






        $product = new Product;
        $product->title= $request->title;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->quantity= $request->quantity;

        $product->category_id =1;
        $product->brand_id =1;
        $product->admin_id =1;
        $product->slug = $request->title;
        $product->save();

        // ProductImage Model Insert Image

        // if($request->hasFile('product_image')){
        //     //insert that image
        //     $image = $request->file('product_image');
        //     $img = time() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('images/products/' .$img);
        //     Image::make($image)->save($location);
        //     $product_image = new ProductImage;
        //     $product_image->product_id = $product->id;
        //     $product_image->image = $img;
        //     $product_image->save();
        // }

        if($request->product_image){

            foreach($request->product_image as $image){

                
                    //insert that image
                  //  $image = $request->file('product_image');
                    $img = time() . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/products/' .$img);
                    Image::make($image)->save($location);
                    $product_image = new ProductImage;
                    $product_image->product_id = $product->id;
                    $product_image->image = $img;
                    $product_image->save();
                

            }
        }
        session()->flash('success','product has created successfully');
        return  redirect()->route('admin.product.create');
       
    }
    

}
