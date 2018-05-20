<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ReferalsController extends Controller
{
    public function ShowWebs()
    {
    	return view('users.WebsUser');
    }

    public function ShowReferals()
    {
    	return view('users.Referals');
    }
}
