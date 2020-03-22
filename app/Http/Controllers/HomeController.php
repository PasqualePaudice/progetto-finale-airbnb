<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Apartment;
use App\Message;
use Illuminate\Support\Facades\Auth;

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

    public function dettagli($id){
        $apartment=Apartment::where('id',$id)->first();
        dd($apartment);
      $coordinate = Coordinate::where('id',$apartment->coordinates_id)->first();

      return view('dettagli',[
        'apartment' => $apartment , 'coordinate' => $coordinate
      ]);

    }
}
