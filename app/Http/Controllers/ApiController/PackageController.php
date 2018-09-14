<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;

use App\Transformers\PackageTransformer;

use App\TicketsPackage;


class PackageController extends Controller
{
    public function ShowPackages()
    {
    	$Tickets=TicketsPackage::all();

       if ($Tickets->isEmpty()) 
       { 
        return Response::json(['status'=>'Esta Vacio'], 200);
       }

       $Json = Fractal::create()
                           ->collection($Tickets)
                           ->transformWith(new PackageTransformer)                
                           ->toArray();          

        return Response::json($Json);
    }
}
