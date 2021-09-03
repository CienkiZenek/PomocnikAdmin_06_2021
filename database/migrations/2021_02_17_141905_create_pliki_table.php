<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlikiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pliki', function (Blueprint $table) {
            $table->id();
            $table->string('plik')->nullable();
            $table->string('plik_nazwa')->nullable();// Wyświetlana nazwa pliku
            $table->string('dzial')->nullable();// Haslo lub Zagadnienie
            $table->unsignedBigInteger('id_pozycja')->nullable();// id Hasła lub zagadnienia do ktorego jest dołączone
            $table->unsignedBigInteger('dodal_user')->default('1');;// kto dodał
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
        Schema::dropIfExists('pliki');
    }
}
