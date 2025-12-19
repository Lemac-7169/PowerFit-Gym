<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('mame'); // Nombre completo
            $table->string('cedula')->unique(); // Cédula única
            $table->string('phone'); // Teléfono
            $table->string('membership_type'); // Mensual, Trimestral, etc.
            $table->date('start_date'); // Inicio
            $table->date('end_date'); // Fin
            $table->boolean('is_active')->default(true);
            $table->softDeletes(); // CRUCIAL para el requisito "legal"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
