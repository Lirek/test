<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BidderRoles;

class ModuleBidderController extends Controller
{
	public function ModulesBidder() {
		$modules = BidderRoles::all();
		return view('promoter.AdminModules.ModulesBidder')->with('modules',$modules);
	}

    public function addModule(Request $request) {
    	BidderRoles::store($request);
    	return response()->json($request->all());
    }

    public function infoModule($idModule) {
    	$module = BidderRoles::infoModule($idModule);
    	return response()->json($module);
    }

    public function updateModule(Request $request) {
    	BidderRoles::updateModule($request);
    	return response()->json($request->all());
    }

    public function deleteModule($idModule){
    	BidderRoles::deleteModule($idModule);
    	return response()->json($idModule);
    }
}
