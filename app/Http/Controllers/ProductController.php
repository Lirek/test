<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Products;

class ProductController extends Controller
{
    public function products(){
    	$products = Products::myProducts(Auth::guard('bidder')->user()->id);
    	return view('bidder.products')->with('products',$products);
    }

    public function productStore(Request $request) {
    	Products::store($request);
    	return redirect()->action("ProductController@products");
    }

    public function productDelete($idProduct) {
    	$product = Products::deleteProducto($idProduct);
    	return response()->json($product);
    }

    public function productInfo($idProduct) {
    	$product = Products::findProducto($idProduct);
    	$product->each(function($product){
    		$product->imagen_prod = asset($product->imagen_prod);
    		$product->pdf_prod = asset($product->pdf_prod);
    		$product->SubProducto;
    	});
    	return response()->json($product);
    }

    public function productUpdate(Request $request) {
    	Products::toUpdateProducts($request);
    	return redirect()->action("ProductController@products");
    }
}
