<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soci', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cognome');
            $table->string('username')->nullable();
            $table->year('anno');

            $table->char('status', 1)->default('0');
            //normale = 0, admin = 1, special = 2, gratis = 3, illimitato = 4

            $table->boolean('ricaricato')->default(false);
            $table->timestamps();

            $table->index(['nome', 'cognome', 'anno']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
