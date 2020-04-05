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
            $table->string('username2');
            $table->string('username3');
            $table->string('username4');
            $table->string('campo');
            $table->date('dataprentazione');
            $table->time('oraon');
            $table->time('oraoff');
            $table->boolean('doppio');
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
        Schema::dropIfExists('prenotaziones');
    }
}
