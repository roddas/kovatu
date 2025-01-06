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
        Schema::create('proverbio', function (Blueprint $table) {
            $table->increments('id_proverbio')->unsigned()->primary();
            $table->text('proverbio');
            $table->text('interpretacao');
            $table->foreignId('uid');
            $table->string('lingua', 100);
            $table->timestamps();
            $table->foreign('uid')->references('uid')->on('utilizador');
            $table->foreign('lingua')->references('lingua')->on('lingua');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proverbio');
    }
};
