<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrzekazdniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('przekazdnia', function (Blueprint $table) {
            $table->id();
            $table->text('tytul')->nullable();
            $table->text('naglowek')->nullable();
            $table->text('tresc')->nullable();
            $table->text('ramka1')->nullable();
            $table->text('ramka2')->nullable();
            $table->string('status')->nullable();
            $table->string('dodal_user_nazwa')->nullable();
            $table->integer('dodal_user')->default('3');// kto dodał
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
        Schema::dropIfExists('przekazdnia');
    }
}
