<?php

namespace App\Http\Controllers\BidderAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BidderRoles;


//Trait
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //Sends Password Reset emails
    use SendsPasswordResetEmails;

    //Shows form to request password reset
    public function showLinkRequestForm()
    {
      
      $modules = BidderRoles::all();

        return view('bidder.passwords.email')->with('modules',$modules);
    }

    //Password Broker for Seller Model
    public function broker()
    {
         return Password::broker();
    }
}
