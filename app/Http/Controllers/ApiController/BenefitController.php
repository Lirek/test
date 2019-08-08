<?php

namespace App\Http\Controllers\ApiController;

use App\Bidder;
use App\Conversion;
use App\exchange_product;
use App\Products;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitController extends Controller
{
    public function index()
    {
        /*
         * Cuando un aliado agrega un producto agrega el costo en $
         * en la tabla exchange_product:
         * amount es el total en pts
         * cost costo unitario del producto en $
         * */
        $valPunto = Conversion::where('tipo','punto')->where('hasta',null)->first();
        $beneficios = Products::whereStatus("Aprobado");
        $todosBeneficios = [];
        foreach ($beneficios as $beneficio) {
            $img = [];
            if ($beneficio->saveImg()) {
                foreach ($beneficio->saveImg as $imgProduct) {
                    $img[] = [
                        'imagen_prod' => $imgProduct->imagen_prod
                    ];
                }
            }
            $todosBeneficios[] = [
                'id' => $beneficio->id,
                'name' => $beneficio->name,
                'description' => $beneficio->description,
                'pdf_file' => $beneficio->pdf_prod,
                'stock' => $beneficio->amount,
                'cost' => $beneficio->cost,
                'images' => $img
            ];
        }

        $mios = exchange_product::where('user_id',auth()->user()->id)->where('status','Aprobado')->orderBy('updated_at','desc')->get();
        if ($mios->count()!=0) {
            foreach ($mios as $mio) {
                $idMyProducts[] = $mio->product_id;
            }
            for ($i=0; $i<count($idMyProducts); $i++) {
                $misProductos = Products::where('id',$idMyProducts[$i])->get();
                foreach ($misProductos as $beneficio) {
                    $img = [];
                    if ($beneficio->saveImg()) {
                        foreach ($beneficio->saveImg as $imgProduct) {
                            $img[] = [
                                'imagen_prod' => $imgProduct->imagen_prod
                            ];
                        }
                    }
                    $misBeneficios[] = [
                        'idBuy' => $mios[$i]->id,
                        'id' => $beneficio->id,
                        'name' => $beneficio->name,
                        'description' => $beneficio->description,
                        'pdf_file' => $beneficio->pdf_prod,
                        'cost' => $mios[$i]->amount,
                        'images' => $img
                    ];
                }
            }
        } else {
            $misBeneficios = [];
        }

        $entregado = exchange_product::where('user_id',auth()->user()->id)->where('status','Entregado')->orderBy('updated_at','desc')->get();
        if ($entregado->count()!=0) {
            foreach ($entregado as $mio) {
                $idDeliveredProducts[] = $mio->product_id;
            }
            for ($i=0; $i<count($idDeliveredProducts); $i++) {
                $beneficios = Products::where('id',$idDeliveredProducts[$i])->get();
                foreach ($beneficios as $beneficio) {
                    $img = [];
                    if ($beneficio->saveImg()) {
                        foreach ($beneficio->saveImg as $imgProduct) {
                            $img[] = [
                                'imagen_prod' => $imgProduct->imagen_prod
                            ];
                        }
                    }
                    $entregados[] = [
                        'id' => $beneficio->id,
                        'name' => $beneficio->name,
                        'description' => $beneficio->description,
                        'pdf_file' => $beneficio->pdf_prod,
                        'cost' => $entregado[$i]->amount,
                        'images' => $img
                    ];
                }
            }
        } else {
            $entregados = [];
        }

        $data = [
            'allBenefits' => $todosBeneficios,
            'myBenefits' => $misBeneficios,
            'benefitsDelivered' => $entregados
        ];
        return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
    }

    public function buy(Request $request)
    {
        // cantidad = cantidad de productos
        // total = total de puntos gastados en la compra
        // id = id del producto
        $datos = $request->only(array_keys($request->all()));
        $rules = [
            'cantidad' => 'required',
            'total' => 'required',
            'id' => 'required'
        ];
        $validator = Validator::make($datos, $rules);
        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages()],200);
        }

        $beneficio = Products::find($request->id);
        if ($request->total > auth()->user()->points) {
            return response()->json(['meta'=>['code'=>202],'data'=>0],200);
        }
        try {
            /*
             * en la tabla exchange_product:
             * amount es el total en pts
             * cost costo unitario del producto en $
             * */
            $Producto = new exchange_product;
            $Producto->product_id = $beneficio->id;
            $Producto->user_id = auth()->user()->id;
            $Producto->amount = $request->total;
            $Producto->cost = $beneficio->cost;
            $Producto->status = "Aprobado";
            $Producto->save();

            $beneficio->amount = $beneficio->amount - $request->cantidad;
            $beneficio->save();

            $user = User::find(auth()->user()->id);
            $user->points = $user->points - $request->total;
            $user->save();

            if ($beneficio->bidder_id != 0) {
                $bidder = Bidder::find($beneficio->bidder_id);
                $bidder->pendding_points = $bidder->pendding_points + $request->total;
                $bidder->save();
            }
            return response()->json(['meta'=>['code'=>200],'data'=>1],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e->getMessage()],200);
        }
    }

    public function confirm($id)
    {
        $buy = exchange_product::where('user_id',auth()->user()->id)->where('product_id',$id)->count();
        return response()->json(['meta'=>['code'=>200],'data'=>$buy],200);
    }

    public function delivered($id)
    {
        try {
            $buy = exchange_product::where('id',$id)->where('user_id',auth()->user()->id)->where('status','Aprobado')->get();
            if ($buy!=null) {
                foreach ($buy as $b) {
                    $b->status = "Entregado";
                    $b->save();
                }
                $buy->each(function ($buy){
                    $buy->Producto;
                });
                if ($buy[0]->Producto->bidder_id!=0) {
                    $bidder = Bidder::find($buy[0]->Producto->bidder_id);
                    $bidder->pendding_points = $bidder->pendding_points - $buy[0]->amount;
                    $bidder->points = $bidder->points + $buy[0]->amount;
                    $bidder->save();
                }
                return response()->json(['meta'=>['code'=>200],'data'=>1],200);
            } else {
                return response()->json(['meta'=>['code'=>200],'data'=>0],200);
            }
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e->getMessage()],200);
        }
    }
}
