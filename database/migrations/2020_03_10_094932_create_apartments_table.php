<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            
            $table->longText('descrizione_appartamento');

            $table->integer('stanze');

            $table->integer('posti_letto');

            $table->integer('bagni');

            $table->integer('metri_quadri');

            $table->text('indirizzo');

            $table->string('cover_image')->nullable();

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
        Schema::dropIfExists('apartments');
    }
}
