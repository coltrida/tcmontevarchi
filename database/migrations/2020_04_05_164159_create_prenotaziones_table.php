<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrenotazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prenotazioni', function (Blueprint $table) {
            $table->id();
            $table->string('username1');
            $table->string('username2')->nullable();
            $table->string('username3')->nullable();
            $table->string('username4')->nullable();
            $table->string('campo');
            $table->date('dataprenotazione');
            $table->tinyInteger('oraon');
            $table->boolean('doppio');
            $table->timestamps();

            $table->index(['dataprenotazione', 'campo', 'oraon']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prenotaziones');
    }
}
