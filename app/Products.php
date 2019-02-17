<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

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
		'status'
    ];

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

    	$product->bidder_id = 0;
    	$product->imagen_prod = $imagen_prod;
    	$product->pdf_prod = $pdf_prod;
    	$product->name = $request->name;
    	$product->description = $request->description;
    	$product->cost = $request->cost;
    	$product->status = "Aprobado";
    	$product->save();
    }

    public static function whereStatus($estatus) {
    	return self::where('status',$estatus)->get();
    }

    public static function findProducto($id) {
    	return self::find($id);
    }

    public static function toUpdateProducts($request) {
    	$product = self::find($request->idUpdate);
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
    	$product->cost = $request->cost;
    	$product->save();
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
}
