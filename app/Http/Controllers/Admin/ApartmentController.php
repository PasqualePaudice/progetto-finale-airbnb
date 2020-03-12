<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
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
        return view('admin.apartments.create');
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
        return view('admin.apartments.edit',[
          'apartment' => $apartment
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
