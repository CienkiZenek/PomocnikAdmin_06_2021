<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nazwa');
            $table->string('slug');
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
        Schema::dropIfExists('tagi');
    }
}
