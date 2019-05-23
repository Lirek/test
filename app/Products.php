<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use App\SubProducto;
use App\exchange_product;
use App\image_product;

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

    public function Bidder() {
        return $this->belongsTo('App\Bidder','bidder_id');
    }
    
    public function saveImg() {
        return $this->hasMany('App\image_product','product_id');
    }

    public static function store($request) {
        $product = new Products;

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
        $product->pdf_prod = $pdf_prod;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->cost = $request->cost;
        $product->amount = $request->amount;
        $product->save();
        if (array_key_exists("otraImagen", $request->all()) && $request->otraImagen[0]!=null) {
            foreach ($request->otraImagen as $adj) {
                $nameImagen = "promocionImg_".rand().".".$adj->getClientOriginalExtension();
                $pathImagen = public_path()."/promociones/";
                $adj->move($pathImagen,$nameImagen);
                $imagen_prod = "/promociones/".$nameImagen;
                $adjuntos[] = self::saveAdjunto($imagen_prod);
            }
            foreach ($adjuntos as $adj) {
                $product->saveImg()->save($adj);
            }
        } 
    }

    public static function whereStatus($estatus) {
    	return self::where('status',$estatus)->get();
    }

    public static function findProducto($id) {
    	return self::where('id',$id)->get();
    }

    public static function toUpdateProducts($request) {
    	$product = self::find($request->idUpdate);

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
        $product->amount = $request->amount;
    	$product->save();
        if (array_key_exists("otraImagen", $request->all()) && $request->otraImagen[0]!=null) {
            foreach ($request->otraImagen as $adj) {
                File::delete(public_path().$product->imagen_prod);
                $nameImagen = "promocionImg_".rand().".".$adj->getClientOriginalExtension();
                $pathImagen = public_path()."/promociones/";
                $adj->move($pathImagen,$nameImagen);
                $imagen_prod = "/promociones/".$nameImagen;
                $adjuntos[] = self::saveAdjunto($imagen_prod);
            }
            foreach ($adjuntos as $adj) {
                $product->saveImg()->save($adj);
            }
        } 
    }

    public static function deleteAdjunto($id) {
        $adjunto = image_product::where('product_id',$id)->get();
        foreach ($adjunto as $adj) {
                File::delete(public_path().$adj->imagen_prod);
                image_product::destroy($adj->id);
        }
        return $adjunto;
    }

    public static function deleteProducto($id) {
    	$product = self::find($id);
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

    public static function saveAdjunto($adj) {
        $imagenes = new image_product;
        $imagenes->imagen_prod = $adj;
        return $imagenes;
    }

    public static function myProducts($id) {
        $product = self::where('bidder_id',$id)->get();
        return $product;
    }

    public static function myFotos($id) {
        $photo = image_product::where('product_id',$id)->get();
        return $photo;
    }
}
