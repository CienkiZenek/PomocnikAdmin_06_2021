<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linki', function (Blueprint $table) {
            $table->id();
            $table->text('tresc')->nullable();
            $table->text('link')->nullable();
            $table->text('dzial')->nullable();// Haslo lub Zagadnienie
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
        Schema::dropIfExists('linki');
    }
}
