<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Products;
use App\image_product;

class ProductController extends Controller
{
    public function products(){
    	$products = Products::myProducts(Auth::guard('bidder')->user()->id);
        $products->each(function($products){ 
            $products->saveImg;
        });
    	return view('bidder.products')->with('products',$products);
    }

    public function productStore(Request $request) {
    	Products::store($request);
    	return redirect()->action("ProductController@products");
    }

    public function productDelete($idProduct) {
        $adjunto = Products::deleteAdjunto($idProduct);
    	$product = Products::deleteProducto($idProduct);
    	return response()->json([$adjunto,$product]);
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
