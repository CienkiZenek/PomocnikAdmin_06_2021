<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZagadnieniaTagiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zagadnienia_tagi', function (Blueprint $table) {
            $table->unsignedBigInteger('zagadnienia_id');
            $table->unsignedBigInteger('tagi_id');
            $table->foreign('zagadnienia_id')
                ->references('id')
                ->on('zagadnienia')
                ->onDelete('cascade');
            $table->foreign('tagi_id')
                ->references('id')
                ->on('tagi')
                ->onDelete('cascade');
            $table->primary(['zagadnienia_id', 'tagi_id' ]);
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
