<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiejscaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miejsca', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('media_id');
            $table->string('link');
            $table->text('tytul');
            $table->string('rodzaj');// formum, wiadomość itp
            $table->string('status');// wyświetlane, wstrzymane, archiwum
            $table->string('dodal_user_nazwa');
            $table->text('opis')->nullable();
            $table->unsignedBigInteger('dodal_user')->default('10');;// kto dodał
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
        Schema::dropIfExists('miejsca');
    }
}
