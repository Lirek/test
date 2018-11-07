<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

use App\Megazines;
use App\Tags;
use App\ApplysSellers;
use App\Albums;
use App\Songs;
use App\User;
use App\Seller;
use App\Radio;
use App\Sagas;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\SellersRoles;
use App\Promoters;
use App\LoginControl;
use App\Salesman;
use App\PromotersRoles;
use App\TicketsPackage;
use App\Payments;
use App\Referals;
use App\PointsAssings;
use App\SistemBalance;

class RollBackController extends Controller
{
    public function ShowRollBacks()
    	{	
    		return view('promoter.AdminModules.RollBacks');
   		}

}
