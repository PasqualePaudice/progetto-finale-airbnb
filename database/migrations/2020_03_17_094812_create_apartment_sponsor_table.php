<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_sponsor', function (Blueprint $table) {
                        $table->id();
                        $table->bigInteger('apartment_id')->unsigned();
                        $table->bigInteger('sponsor_id')->unsigned();
                        $table->string('start_sponsor');
                        $table->string('end_sponsor');



                        $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
                        $table->foreign('sponsor_id')->references('id')->on('sponsors')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_sponsor');
    }
}
