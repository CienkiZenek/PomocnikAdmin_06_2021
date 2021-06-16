<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaslaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasla', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('haslo');
            $table->string('slug');
            $table->text('tresc')->nullable();
            $table->unsignedBigInteger('kategoria_id')->nullable();
            $table->unsignedBigInteger('dzial_id')->nullable();
            $table->unsignedBigInteger('dodal_user')->nullable();// kto dodał
            $table->text('historia_zmian')->nullable(); // kto i kiedy aktualizował
            $table->text('linkSlownikPdf')->nullable();
            $table->text('trescLinku')->nullable();
            $table->text('status');

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
        Schema::dropIfExists('hasla');
    }
}
