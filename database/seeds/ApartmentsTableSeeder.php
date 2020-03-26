<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Coordinate;
use GuzzleHttp\Client;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments= config('apartments.apartment_db');

        $i = 1;
        foreach ($apartments as $apartment) {

            $nuovo_appartamento= new Apartment();

            $via = $apartment['indirizzo'];
            $citta = $apartment['city'];
            $stato = $apartment['state'];
            $cap = $apartment['cap'];

            $indirizzo = $via . ' ' . $citta .' '.  $cap;

            $client = new Client();

        	$response = $client->request('GET', 'https://api.tomtom.com/search/2/geocode/' . $indirizzo . '.json?countrySet='. $stato. '&key=YPixAIIG2SgrHPBm2WGBWUa9L4JiGcFe');

        	$statusCode = $response->getStatusCode();

        	$body = $response->getBody()->getContents();

            $body = json_decode($body);

            $prova = $body->results[0];


            $lat = $prova->position->lat;
            $lon = $prova->position->lon;
            $coordinate = new Coordinate();

            $coordinate->lat= $lat;
            $coordinate->lon= $lon;

            $coordinate->save();

            $nuovo_appartamento->fill($apartment);
            $nuovo_appartamento->cover_image = 'uploads/app'. $i .'.jpg';
            $nuovo_appartamento->coordinates_id = $coordinate->id;
            $nuovo_appartamento->save();

            $i++;
        }
    }
}
