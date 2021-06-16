<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrzekazdniaTagiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('przekazdnia_tagi', function (Blueprint $table) {
            $table->unsignedBigInteger('przekazdnia_id');
            $table->unsignedBigInteger('tagi_id');
            $table->foreign('przekazdnia_id')
                ->references('id')
                ->on('przekazdnia')
                ->onDelete('cascade');
            $table->foreign('tagi_id')
                ->references('id')
                ->on('tagi')
                ->onDelete('cascade');
            $table->primary(['przekazdnia_id', 'tagi_id' ]);
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
        Schema::dropIfExists('przekazdnia_tagi');
    }
}
