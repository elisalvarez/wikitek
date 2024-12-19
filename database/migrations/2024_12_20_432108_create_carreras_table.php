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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id('id_carrera');
            $table->string('nombre');
            $table->unsignedBigInteger('id_nivel_interes');
            $table->timestamps();
        });

        Schema::table('carreras', function (Blueprint $table) {
            $table->foreign('id_nivel_interes')->references('id_nivel_interes')->on('niveles_interes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
