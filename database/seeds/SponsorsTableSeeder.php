<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                $sponsors= config('servicesApartment.sponsors_db');
                foreach ($sponsors as $sponsor) {
                    $nuovo_sponsor= new Sponsor();

                    $nuovo_sponsor->fill($sponsor);
                    $nuovo_sponsor->save();

    }
}
}
