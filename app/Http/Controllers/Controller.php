<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\Seller;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome()
    {
//        $sellers = Seller::orderBy('id', 'DESC')->paginate('10');
        $sellers = Seller::all();
        $b=[1,2,3,4];

        return view('welcome')
            ->with('seller', $sellers)
            ->with('a',$b);
    }

}
