<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZnalezioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('znalezione', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->SmallInteger('media_id')->default('1');
            $table->string('nazwa');
            $table->string('link');
            $table->string('rodzaj'); // warto wiedzić itp
            $table->string('status');// wyśietlane, wstrzymane, archiwum
            $table->string('dodal_user_nazwa');
            $table->text('komentarz')->nullable();
            $table->integer('dodal_user');
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
        Schema::dropIfExists('znalezione');
    }
}
