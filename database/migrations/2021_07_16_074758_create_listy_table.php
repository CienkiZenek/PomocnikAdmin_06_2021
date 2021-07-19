<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listy', function (Blueprint $table) {
            $table->id();
            $table->text('tresc');
            $table->string('naglowek')->nullable();
            $table->string('tytul')->nullable();
            $table->string('status')->nullable();// wiadomość wysłana lub robocza
            $table->unsignedBigInteger('autor_id');// kto wysłał
            $table->unsignedBigInteger('odbiorca_id')->nullable();// kto wysłał
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
        Schema::dropIfExists('listy');
    }
}
