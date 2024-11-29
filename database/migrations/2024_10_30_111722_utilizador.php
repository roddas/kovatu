<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilizador', function (Blueprint $table) {
            $table->string('email', 255)->primary();
            $table->string('nome', 45);
            $table->string('sobrenome', 100);
            $table->string('foto', 255)->default('default.svg');
            $table->boolean('ativada')->default(false);
            $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizador');
    }
};
