<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaslaTagiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasla_tagi', function (Blueprint $table) {

            $table->unsignedBigInteger('hasla_id');
            $table->unsignedBigInteger('tagi_id');
            $table->foreign('hasla_id')
                ->references('id')
                ->on('hasla')
                ->onDelete('cascade');
            $table->foreign('tagi_id')
                ->references('id')
                ->on('tagi')
                ->onDelete('cascade');
            $table->primary(['hasla_id', 'tagi_id' ]);
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
        Schema::dropIfExists('hasla_tagi');
    }
}
