<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Apartment;
use App\Visit;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(){

        $apartments= Apartment::all();

        $adesso = Carbon::now();

        $un_mese_fa = $adesso->copy()->subDays('31');


        return view('welcome',['apartments' => $apartments, 'mese_fa'=>$un_mese_fa,'now'=>$adesso]);
    }

    public function dettagli(Apartment $apartment, Request $request){

        $is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');

        $ip = $request->ip();
        if (!(Auth::user() && Auth::user()->id == $apartment->user_id) ) {
            if(!$is_page_refreshed ) {
                $visit = new Visit();
                $visit->apartment_id = $apartment->id;
                $visit->guest_ip = $ip;
                $visit->save();
            };
        }

        $coordinate = Coordinate::where('id',$apartment->coordinates_id)->first();

        return view('dettagli',[
          'apartment' => $apartment , 'coordinate' => $coordinate
        ]);

    }
    public function search(Request $request){

        if ($request->ajax()) {
            return response()->json($request->service);
        };
        $dati = $request->all();

        $lat1 = $dati['lat'];
        $lon1 = $dati['lon'];

        $coordinates = Coordinate::all();

        $filtered_results = [];
        foreach ($coordinates as $coordinate) {
            $lat2 = $coordinate->lat;
            $lon2 = $coordinate->lon;
            $distance = (6371*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180);
            if ($distance <= 20.0) {
                $new = Apartment::where('coordinates_id', $coordinate->id)->first();
                array_push($filtered_results, $new);
            }
        }
        $adesso = Carbon::now();
        $un_mese_fa = $adesso->copy()->subDays('31');
        return view('risultati', [ 'apartments' => $filtered_results, 'now' => $adesso, 'mese_fa'=>$un_mese_fa ]);

    }
    public function storeMessage(Request $request, Apartment $apartment){
        $dati = $request->all();
        $message = new Message();
        $message->fill($dati);
        $message->apartment_id = $apartment->id;
        $message->save();
        return redirect ('dettagli/'. $apartment->id )->with('message', 'Messaggio inviato correttamente!');
    }
}
