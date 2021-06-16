<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropozycjeUwagiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propozycje_uwagi', function (Blueprint $table) {
            $table->id();
            $table->text('naglowek')->nullable();
            $table->text('tresc')->nullable();
            $table->string('status');// dodane, oczekuje, nowe
            $table->string('historia_zmian')->nullable();
            $table->integer('dodal_user')->default('3');// kto dodał
            $table->string('dodal_user_nazwa');
            $table->integer('propozycja_id')->default('2');// id powiązanej propzycji
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
        Schema::dropIfExists('propozycje_uwagi');
    }
}
