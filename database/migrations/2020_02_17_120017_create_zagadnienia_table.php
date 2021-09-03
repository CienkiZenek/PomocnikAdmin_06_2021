<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZagadnieniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zagadnienia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zagadnienie');
            $table->string('slug');
            $table->text('tresc')->nullable();
            $table->text('wiecej')->nullable();
            $table->text('zajawka')->nullable();
            $table->text('zajawka_tytul')->nullable();
            $table->enum('zajawka_pokaz',['Tak', 'Nie'])->default('Nie');// pokazywanie treści zajawki na stronie głownej
            $table->text('rozszerz')->nullable();
            $table->unsignedBigInteger('haslo_id');
            $table->unsignedBigInteger('kategoria_id')->nullable();
            $table->unsignedBigInteger('dzial_id')->nullable();
            $table->unsignedBigInteger('dodal_user')->nullable();// kto dodał
            $table->text('historia_zmian')->nullable(); // kto i kiedy aktualizował
            $table->text('obrazek_karuzela')->nullable();
            $table->text('obrazek1')->nullable();
            $table->text('tytulObrazek1')->nullable();
            $table->text('podpisObrazek1')->nullable();
            $table->text('obrazek2')->nullable();
            $table->text('tytulObrazek2')->nullable();
            $table->text('podpisObrazek2')->nullable();
            $table->text('ramka_mala')->nullable();
            $table->text('ramka_duza')->nullable();
            $table->text('linkSlownikPdf')->nullable();
            $table->text('trescLinku')->nullable();
            $table->text('status');
            $table->tinyInteger('procent_tresci');// jaki procent treści już jest kompletny
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
        Schema::dropIfExists('zagadnienia');
    }
}
