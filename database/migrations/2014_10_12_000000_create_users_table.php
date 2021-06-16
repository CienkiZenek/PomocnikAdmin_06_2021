<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('stan')->nullable();
            $table->string('ranga')->nullable();
            $table->string('uprawnienia')->nullable();
            $table->boolean('izsk_warunek')->default(0);
            $table->string('izsk', 3)->default('nie');
            $table->boolean('listy_odbiera')->default(0);
            $table->boolean('zgoda_listy_red')->default(0); // zgoda na otrzymywanie listów od redakcji
            $table->boolean('zgoda_listy_innych')->default(0); // zgoda na otrzymywanie listów od innych użytkowników
            $table->boolean('zgoda_regulamin')->default(0); // akceptacja regulaminu
            $table->string('imie')->nullable();
            $table->string('nazwisko')->nullable();
            $table->string('ulica_nazwa')->nullable();
            $table->string('ulica_numer')->nullable();
            $table->string('miejscowosc')->nullable();
            $table->string('telefon')->nullable();
            $table->string('kod', 6)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
