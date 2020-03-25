<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Service;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Coordinate;
use Braintree_Transaction;
use App\Sponsor;
use App\Visit;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;




class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all()->where('user_id', '=', Auth::user()->id);

        $apartment_sponsors = DB::table('apartment_sponsor')->get();

        $now = Carbon::now();





        // $apartments = Apartment::all();
        return view('admin.apartments.index',[
          'apartments' => $apartments, 'now' => $now
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create',['services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                'title' => 'required|max:255',
                'indirizzo' => 'required|max:100',
                'descrizione_appartamento'=> 'required',
                'posti_letto'=> 'required|max:2',
                'stanze' => 'required|max:2',
                'bagni' => 'required|max:2',
                'metri_quadri' => 'required|max:5'
            ]);


        $via = $request->indirizzo;
        $citta = $request->city;
        $stato = $request->state;
        $cap = $request->cap;

        $indirizzo = $via . ' ' . $citta .' '.  $cap;

        $client = new Client();

    	$response = $client->request('GET', 'https://api.tomtom.com/search/2/geocode/' . $indirizzo . '.json?countrySet='. $stato. '&key=YPixAIIG2SgrHPBm2WGBWUa9L4JiGcFe');

    	$statusCode = $response->getStatusCode();

    	$body = $response->getBody()->getContents();

        $body = json_decode($body);

        $prova = $body->results[0];


        $lat = $prova->position->lat;
        $lon = $prova->position->lon;





        $dati= $request->all();

        $coordinate = new Coordinate();

        $coordinate->lat= $lat;
        $coordinate->lon= $lon;

        $coordinate->save();

        $apartment = new Apartment();

        $apartment->fill($dati);

        $apartment->coordinates_id = $coordinate->id;

        if (!empty($dati['cover_image'])) {
            $cover_image= $dati['cover_image'];

            $cover_image_path= Storage::put('uploads', $cover_image);

            $apartment->cover_image= $cover_image_path;
        }


        $apartment->save();

        if(!empty($dati['service_id'])) {
            // sono stati selezionati dei servizi => li assegno all' appartamento
            // sincronizzo l' appartamneto creato con i servizi scelti

             $apartment->services()->sync($dati['service_id']);
         }

        return redirect()->route('admin.apartments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $coordinate = Coordinate::where('id',$apartment->coordinates_id)->first();
        $messages = $apartment->messages()
                    ->orderBy('created_at', 'DESC')
                    ->get();
      if ($apartment->user_id == Auth::user()->id) {
        return view('admin.apartments.show',[
          'apartment' => $apartment , 'coordinate' => $coordinate,
          'messages' => $messages
        ]);
      }
      else {
        return abort(404);
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
      if ($apartment->user_id == Auth::user()->id) {
        $services = Service::all();
        return view('admin.apartments.edit',[
          'apartment' => $apartment,'services'=>$services
        ]);
      }
      else {
        return abort(404);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
                'title' => 'required|max:255',
                'indirizzo' => 'required|max:100',
                'city' => 'required|max:100',
                'state' => 'required|max:100',
                'descrizione_appartamento'=> 'required',
                'posti_letto'=> 'required|max:2',
                'stanze' => 'required|max:2',
                'bagni' => 'required|max:2',
                'metri_quadri' => 'required|max:6'
            ]);

        $dati = $request->all();
        if (!empty($dati['cover_image'])) {

             $cover_image = $dati['cover_image'];
             $cover_image_path = Storage::put('uploads', $cover_image);

             $dati['cover_image'] = $cover_image_path;
         }

         $via = $request->indirizzo;
         $citta = $request->city;
         $stato = $request->state;
         $cap = $request->cap;

         $indirizzo = $via . ' ' . $citta .' '.  $cap;

         $client = new Client();

     	$response = $client->request('GET', 'https://api.tomtom.com/search/2/geocode/' . $indirizzo . '.json?countrySet='. $stato. '&key=YPixAIIG2SgrHPBm2WGBWUa9L4JiGcFe');

     	$statusCode = $response->getStatusCode();

     	$body = $response->getBody()->getContents();

         $body = json_decode($body);

         $prova = $body->results[0];


         $lat = $prova->position->lat;
         $lon = $prova->position->lon;

         $old_coordinate = Coordinate::where('id', $apartment->coordinates_id)->first();
         $old_coordinate->lat = $lat;
         $old_coordinate->lon = $lon;
         $old_coordinate->update();
        $apartment->update($dati);

        if (!empty($dati['service_id'])) {
            $apartment->services()->sync($dati['service_id']);
        }
        else {
            $apartment->services()->sync([]);
        }


        return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        // trova il record coordinate corrispondente e lo prende con first()
      $coordinate=Coordinate::all()->where('id',$apartment->coordinates_id)->first();
      $visits = Visit::all()->where('apartment_id',$apartment->id);
      $messages = Message::all()->where('apartment_id',$apartment->id);

      if(!empty($apartment->cover_image)) {
          // elimino l'immagine di copertina
          Storage::delete($apartment->cover_image);
      }
      if($apartment->sponsors->isNotEmpty()) {
          $apartment->sponsors()->sync([]);
      }

      // cancella prima l'appartamento e perde il legame
      $apartment->delete();
      // cancella poi le coordinate nella tabella, che non sono più legate da vincoli
      $coordinate->delete();
      foreach ($messages as $message) {
          $message->delete();
      };
      foreach ($visits as $visit) {
          $visit->delete();
      };
      return redirect()->route('admin.apartments.index');
    }

    public function pay(Apartment $apartment){

        return view('admin.sponsor.index',['apartment' => $apartment]);

    }

    public function price(Request $request , Apartment $apartment){

         return view('admin.sponsor.check',['apartment' => $apartment , 'prezzo' => $request->Piano]);
    }

    public function make(Request $request) {

    $price = $request->input('prezzo');
    $apartment_id = $request->input('amp;apartment');
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];

    $status = Braintree_Transaction::sale([
	'amount' => $price,
	'paymentMethodNonce' => $nonce,
    'customer' => [
        'firstName'=> Auth::user()->name,
        'lastName'=> Auth::user()->lastname,
        'email'=> Auth::user()->email
    ],
	'options' => [
	    'submitForSettlement' => True
	]
    ]);

    if ($status->success) {
        $start = Carbon::now();


        if($price == '2.99'){
            $id_price='1';
            $end=  Carbon::now()->add(1, 'day');

        }elseif($price == '5.99'){
            $id_price='2';
            $end=  Carbon::now()->add(72, 'hour');
        }else{
            $id_price='3';
            $end=  Carbon::now()->add(144, 'hour');
        }

        $appartamento = Apartment::find($apartment_id);
        // $sponsor = Sponsor::find($id_price);

        $appartamento->sponsors()->attach($id_price,['start_sponsor'=>$start,'end_sponsor'=>$end]);

        $messaggio = true;
    }else {
        $messaggio = false;
    }



    return response()->json($status);


    }

    public function statistic(Apartment $apartment) {
        return view('admin.apartments.statistic', ['apartment' => $apartment]);
    }

    public function chart(Apartment $apartment) {
        $result = Visit::where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m'))"),date('Y-m'))
                    ->where('apartment_id', $apartment->id)
                    ->orderBy('created_at','ASC')
                    ->get();

        $date = [];
        $array_results = $result->toArray();
        foreach ($array_results as $key) {
            $creata = $key['created_at'];
            $muta = substr($creata,0, 10);
            array_push($date, $muta);
        };
        $collection = collect($date);

        $counted = $collection->countBy();

        $final = $counted->all();
        return response($final);
    }

    public function messages(Apartment $apartment) {
        $messages = $apartment->messages()
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('admin.apartments.messages', ['apartment' => $apartment, 'messages'=>$messages]);
    }

    public function messagesShow(Apartment $apartment, Message $message) {
        $message->read = 1;
        $message->update();
        return view('admin.apartments.showmessage', ['apartment' => $apartment, 'message'=>$message]);
    }

    public function messagesDestroy(Apartment $apartment, Message $message) {
        $message->delete();
        return redirect()->route('admin.apartments.messages', [ 'apartment' => $apartment]);
    }

    public function change_visibility(Apartment $apartment) {
        if ($apartment->visible == 0) {
            $apartment->visible = 1;
            $apartment->update();
            return redirect ('admin/apartments')->with('message', 'L\'appartamento è visibile!');
        } else {
            $apartment->visible = 0;
            $apartment->update();
            return redirect ('admin/apartments')->with('message', 'L\'appartamento è stato disattivato!');
        }
    }

}
