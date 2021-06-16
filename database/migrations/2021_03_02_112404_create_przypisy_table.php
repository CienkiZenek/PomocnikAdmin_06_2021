<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrzypisyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('przypisy', function (Blueprint $table) {
            $table->id();
            $table->text('tresc')->nullable();
            $table->unsignedBigInteger('numer')->nullable();// numer przypisu
            $table->unsignedBigInteger('id_pozycja')->nullable();// id zagadnienia do ktorego jest dołączone
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
        Schema::dropIfExists('przypisy');
    }
}
