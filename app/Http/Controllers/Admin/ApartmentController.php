<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Service;
use Illuminate\Support\Facades\Auth;

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
        // $apartments = Apartment::all();
        return view('admin.apartments.index',[
          'apartments' => $apartments
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

        $dati= $request->all();


        $apartment = new Apartment();

        $apartment->fill($dati);

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
      return view('admin.apartments.show',[
        'apartment' => $apartment
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('admin.apartments.edit',[
          'apartment' => $apartment,'services'=>$services
        ]);
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
      $apartment->delete();
      return redirect()->route('admin.apartments.index');
    }
}
