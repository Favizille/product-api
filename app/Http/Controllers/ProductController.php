<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewAllProducts(){
        //returns all the products
        return Product::all();
    }

    public function createProduct(Request $request){
        $request->validate([
            "name" => "required",
            "slug" => "required",
            "price" => "required",
        ]);

        //to create a product requiring all the fields to be filled
        return Product::create($request->all());
    }

    public function searchProduct($slug){
        //get product by slug
        // $product= Product::find($slug);

       $product =  Product::where('name', 'like', '%'.$slug.'%')

        ->orWhere('slug', 'like', '%'.$slug.'%')
        ->orWhere('price', 'like', '%'.$slug.'%')->get();

        // dd($product);

        return response()->json([
            'status'=>'success',
            'message'=>$product
        ]);
    }

    public function editProduct(Request $request, $id){
        $product = Product::find($id);
        $product->update($request->all());


        return response()->json([
            'status' => 'success',
            'message' => $product
        ]);
    }

    public function deleteProduct($id){
        //get product by id then delete product
        $product= Product::find($id);
        $product->delete();

        return response()->json([
            'status'=> 'success',
            'message'=>$product
        ]);
    }
}
