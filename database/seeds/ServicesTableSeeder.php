<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services= config('servicesApartment.services_db');
        foreach ($services as $service) {
            $nuovo_servizio= new Service();

            $nuovo_servizio->fill($service);
            $nuovo_servizio->save();
        }
    }
}
