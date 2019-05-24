<?php

namespace App\Http\Controllers\BidderAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Bidder;

use Laracasts\Flash\Flash;

class LoginController extends Controller {
	
    public function logout() {
    	Auth::guard('bidder')->logout();
    	return redirect('/');
    }

    public function login(Request $request) {
    	$bidder = Bidder::valEmail($request->email);
    	if ($bidder!=null) {
    		if ($bidder->status=="Aprobado" && $bidder->account_status=="open") {
    			if (Auth::guard('bidder')->attempt(['email' => $request->email, 'password' => $request->password])) {
			        return redirect()->action(
			            'BidderController@home'
			        );
    			} else {
    				// credenciales incorrectas
    				Flash::error('Usuario o contraseña invalidos.')->important();
    				return redirect('/');
    			}
    		} else {
    			// el usuario no esta activo
    			Flash::error('Usuario no está activo.')->important();
				return redirect('/');
    		}
    	} else {
    		// el usuario no existe
    		Flash::error('Usuario o contraseña invalidos.')->important();
			return redirect('/');
    	}
    }
}
