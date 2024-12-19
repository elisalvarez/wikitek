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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('apellido_paterno', 45);
            $table->string('apellido_materno', 45);
            $table->integer('edad');
            $table->unsignedBigInteger('id_genero');
            $table->unsignedBigInteger('id_estado_civil');
            $table->unsignedBigInteger('id_nivel_interes');
            $table->unsignedBigInteger('id_carrera');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_genero')->references('id_genero')->on('generos');
            $table->foreign('id_estado_civil')->references('id_estado_civil')->on('estados_civiles');
            $table->foreign('id_nivel_interes')->references('id_nivel_interes')->on('niveles_interes');
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
