<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZagadnieniaUwagiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zagadnienia_uwagi', function (Blueprint $table) {
            $table->id();
            $table->text('naglowek')->nullable();
            $table->text('tresc')->nullable();
            $table->string('status');// dodane, oczekuje, nowe
            $table->string('historia_zmian')->nullable();
            $table->string('do'); // czy uwaga jest do zagadnienia czy do hasla
            $table->integer('dodal_user')->default('3');// kto dodał
            $table->string('dodal_user_nazwa');
            $table->integer('zagadnienie_id')->nullable();;// id powiązanego zagadnienia (ewentualngo)
            $table->integer('haslo_id')->nullable();;// id powiązanego hasla (ewentualngo)
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
        Schema::dropIfExists('zagadnienia_uwagi');
    }
}
