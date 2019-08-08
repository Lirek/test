<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
/*
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;
*/
use App\Transformers\PackageTransformer;
use App\TicketsPackage;

class PackageController extends Controller
{
    public function ShowPackages() {
    	$Tickets = TicketsPackage::all();
    	if ($Tickets->isEmpty()) {
            return response()->json(['meta'=>['code'=>201],'data'=>[]],200);
    	}
    	foreach ($Tickets as $t) {
    	    $data[] = [
    	        'id' => $t->id,
                'amount' => $t->amount,
                'cost' => $t->cost,
                'points_cost' => $t->points_cost,
                'name' => $t->name
            ];
        }
        return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
    }

    public function encode(Request $request) {
        $imagenData = file_get_contents($request->img);
        $data = base64_encode($imagenData);
        return $data;
    }
}
