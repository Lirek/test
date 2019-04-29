<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use App\SubProducto;
use App\exchange_product;

class Products extends Model
{
	protected $table = 'product';
    protected $fillable = [
		'id',
		'bidder_id',
		'imagen_prod',
		'pdf_prod',
		'name',
		'description',
		'cost',
        'amount',
		'status'
    ];

    public function SubProducto() {
      return $this->hasMany('App\SubProducto','product_id');
    }

    public function exchange_product() {
      return $this->hasMany('App\exchange_product','product_id');
    }
    
    public static function store($request) {
        $product = new Products;
        $imagen = $request->file('imagen');
        $nameImagen = "promocionImg_".time().".".$imagen->getClientOriginalExtension();
        $pathImagen = public_path()."/promociones/";
        $imagen->move($pathImagen,$nameImagen);
        $imagen_prod = "/promociones/".$nameImagen;

        $pdf = $request->file('pdf_prod');
        $namePDF = "promocionPdf_".time().".".$pdf->getClientOriginalExtension();
        $pathPdf = public_path()."/promociones/";
        $pdf->move($pathPdf,$namePDF);
        $pdf_prod = "/promociones/".$namePDF;

        if (array_key_exists('idBidder', $request->all())) {
            $product->bidder_id = $request->idBidder;
            $product->status = "En Revision";
        } else {
            $product->bidder_id = 0;
            $product->status = "Aprobado";
        }
        $product->imagen_prod = $imagen_prod;
        $product->pdf_prod = $pdf_prod;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->cost = $request->cost;
        $product->amount = $request->amount;
        $product->save();
        /*
        if (array_key_exists("otroCost", $request->all()) && $request->otroCost[0]!=null) {
            foreach ($request->otroCost as $cost) {
                $costs[] = self::saveCosts($cost);
            }
            foreach ($costs as $cost) {
                $product->SubProducto()->save($cost);
            }
        }
        */
    }

    public static function whereStatus($estatus) {
    	return self::where('status',$estatus)->get();
    }

    public static function findProducto($id) {
    	return self::where('id',$id)->get();
    }

    public static function toUpdateProducts($request) {
    	$product = self::find($request->idUpdate);
        //dd($request->all());
    	if ($request->imagen!=null) {
    		File::delete(public_path().$product->imagen_prod);
    		$imagen = $request->file('imagen');
			$nameImagen = "promocionImg_".time().".".$imagen->getClientOriginalExtension();
			$pathImagen = public_path()."/promociones/";
			$imagen->move($pathImagen,$nameImagen);
			$imagen_prod = "/promociones/".$nameImagen;
			$product->imagen_prod = $imagen_prod;
    	}
    	if ($request->pdf_prod!=null) {
			File::delete(public_path().$product->pdf_prod);
			$pdf = $request->file('pdf_prod');
			$namePDF = "promocionPdf_".time().".".$pdf->getClientOriginalExtension();
			$pathPdf = public_path()."/promociones/";
			$pdf->move($pathPdf,$namePDF);
			$pdf_prod = "/promociones/".$namePDF;
			$product->pdf_prod = $pdf_prod;
    	}
    	$product->name = $request->name;
    	$product->description = $request->description;
    	$product->cost = $request->valor*$request->valorPunto;
        $product->amount = $request->amount;
    	$product->save();
        /*
        if (array_key_exists("otroCost", $request->all()) && $request->otroCost[0]!=null) {
            SubProducto::where('product_id',$request->idUpdate)->delete();
            foreach ($request->otroCost as $cost) {
                $costs[] = self::saveCosts($cost);
            }
            foreach ($costs as $cost) {
                $product->SubProducto()->save($cost);
            }
        }
        */
    }

    public static function deleteProducto($id) {
    	$product = self::find($id);
    	File::delete(public_path().$product->imagen_prod);
    	File::delete(public_path().$product->pdf_prod);
    	self::destroy($id);
    	return $product;
    }

    public static function statusProduct($id,$status) {
    	$product = self::find($id);
    	$product->status = $status;
    	$product->save();
    	return $product;
    }

    public static function saveCosts($cost) {
        $SubProducto = new SubProducto;
        $SubProducto->cost = $cost;
        return $SubProducto;
    }

    public static function myProducts($id) {
        $product = self::where('bidder_id',$id)->get();
        return $product;
    }
}
