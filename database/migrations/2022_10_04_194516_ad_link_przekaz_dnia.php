<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('przekazdnia', function (Blueprint $table) {
            $table->string('link')->after('tresc')->nullable();
            $table->string('link_tresc')->after('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('przekazdnia', function (Blueprint $table) {
            //
        });
    }
};
