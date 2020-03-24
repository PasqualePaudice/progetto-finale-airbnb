<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinate;
use App\Apartment;
use App\Visit;
use App\Service;
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
            $services = $request->service;
            $lat1 = $request->lat;
            $lon1 = $request->lon;
            $range = $request->range;
            $number_elements_array = count($services);

            if($services === null) {
                $query = DB::table('apartments')
                    ->join('coordinates', 'apartments.coordinates_id', '=', 'coordinates.id')
                    ->leftJoin('apartment_sponsor', 'apartment_sponsor.apartment_id', '=', 'apartments.id')
                    ->select('*')
                    ->where('apartments.visible', 1)
                    ->orderBy('apartments.created_at', 'desc')
                    ->get();
            } else {
                $query = DB::table('apartment_service')
                ->join('apartments', 'apartment_service.apartment_id', '=', 'apartments.id')
                ->leftJoin('apartment_sponsor', 'apartment_sponsor.apartment_id', '=', 'apartments.id')
                ->join('coordinates', 'apartments.coordinates_id', '=', 'coordinates.id')
                ->select('apartments.id', 'apartments.visible', 'apartment_sponsor.end_sponsor', 'apartments.cover_image', 'apartments.title', 'apartments.city', 'coordinates.lat', 'coordinates.lon',
                DB::raw("COUNT(*) as matchedItems"))
                ->whereIn('service_id', $services)
                ->where('apartments.visible', 1)
                ->groupBy('apartment_service.apartment_id')
                ->having('matchedItems', '=', $number_elements_array)
                ->orderBy('apartments.created_at', 'desc')
                ->get();
            }
              $last_filtered = [];
              foreach ($query as $key) {
                  $lat2 = $key->lat;
                  $lon2 = $key->lon;
                  $distance = (6371*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180);
                  if ($distance <= $range) {
                      array_push($last_filtered, $key);
                  }
                }
            return response()->json($last_filtered);
        };

        $dati = $request->all();

        // lat e lon della ricerca fatta in search
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
        $services = Service::all();
        $adesso = Carbon::now();
        $un_mese_fa = $adesso->copy()->subDays('31');
        return view('risultati', [
            'apartments' => $filtered_results,
            'services' => $services,
            'now' => $adesso,
            'mese_fa'=>$un_mese_fa,
            'lat'=> $lat1,
            'lon'=> $lon1
        ]);

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
