<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_service', function (Blueprint $table) {

            $table->bigInteger('apartment_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();

            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('service_id')->references('id')->on('services');

            $table->primary(['apartment_id','service_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_service');
    }
}
