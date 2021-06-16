<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropozycje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propozycje', function (Blueprint $table) {
            $table->id();
            $table->text('tytul')->nullable();
            $table->text('tresc')->nullable();
            $table->string('status');// dodane, oczekuje, nowe
            $table->integer('dodal_user')->default('3');// kto dodał
            $table->string('dodal_user_nazwa');
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
        Schema::dropIfExists('propozycje');
    }
}
