<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index(){

        $apartments= Apartment::all();

        $adesso = Carbon::now();

        $un_mese_fa = $adesso->copy()->subDays('31');


        return view('welcome',['apartments' => $apartments, 'mese_fa'=>$un_mese_fa,'now'=>$adesso]);
    }

    public function dettagli(Apartment $apartment,Request $request){

        $coordinate = Coordinate::where('id',$apartment->coordinates_id)->first();

        return view('dettagli',[
          'apartment' => $apartment , 'coordinate' => $coordinate
        ]);

    }
}
