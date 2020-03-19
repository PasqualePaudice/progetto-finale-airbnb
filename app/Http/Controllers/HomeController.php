<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Apartment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      return view('admin.home');
    }

    public function dettagli(Apartment $apartment){

      $coordinate = Coordinate::where('id','1')->first();
      // dd($apartment->coordinates_id);
      return view('dettagli',[
        'apartment' => $apartment , 'coordinate' => $coordinate
      ]);

    }
}
