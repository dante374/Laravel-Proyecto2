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
       Schema::create('vendedor', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 20);
            $table->string('apellido', 40);
            $table->string('email'); 
            $table->string('telefono', 20);
            $table->string('direccion');
            $table->date('fecha_nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedor');
    }
};
