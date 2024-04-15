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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->default(0);
            $table->string('codem')->default(0);
            $table->boolean('phone_verified')->default(false);
            $table->string('applicationcode')->nullable(); // Agregamos la columna applicationcode
            $table->boolean('appstatus')->default(false);
            $table->string('api_token')->unique()->nullable()->default(null);
            $table->unsignedBigInteger('role_id'); // Nueva columna para la clave externa
            $table->foreign('role_id')->references('id')->on('roles'); // Definición de la clave externa
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
