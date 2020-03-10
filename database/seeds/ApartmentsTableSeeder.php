<?php

use Illuminate\Database\Seeder;
use App\Apartment;


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

        foreach ($apartments as $apartment) {
            $nuovo_appartamento= new Apartment();

            $nuovo_appartamento->fill($apartment);
            $nuovo_appartamento->save();

        }
    }
}
