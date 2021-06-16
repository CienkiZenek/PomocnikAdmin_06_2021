<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('tytul');
            $table->string('status');
            $table->string('slug');
            $table->string('podpis');
            $table->string('mem')->nullable();
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
        Schema::dropIfExists('memy');
    }
}
