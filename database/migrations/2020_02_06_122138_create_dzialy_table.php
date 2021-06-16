<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDzialyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dzialy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dzial');
            $table->string('slug');
            $table->text('opis')->nullable();
            $table->unsignedBigInteger('dodal_user');// kto dodał
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
        Schema::dropIfExists('dzialy');
    }
}
