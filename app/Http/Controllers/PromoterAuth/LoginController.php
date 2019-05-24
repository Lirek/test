<?php

namespace App\Http\Controllers\PromoterAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class LoginController extends Controller
{
        use AuthenticatesUsers;

        protected $redirectTo = '/promoter_home';

  protected function guard()
  {
     return Auth::guard('Promoter');
  }

  public function showLoginForm()
  	{
      return view('promoter.auth.login');
  	}

}
