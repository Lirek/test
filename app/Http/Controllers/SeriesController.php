<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Series_tag;
use App\Sagas;
use App\Rating;
use App\Episode;
use Laracasts\Flash\Flash;

class SeriesController extends Controller
{
    public function index()
    {
        dd('inde de la serie ');
    }

    public function create()
    {
        $rating = Rating::orderBy('id', 'ASC')->pluck('r_name', 'id');
        $sagas = Sagas::orderBy('id', 'ASC')->pluck('sag_name', 'id');

        return view('seller.serie.create')
            ->with('ratin', $rating)
            ->with('saga', $sagas);

    }
}
