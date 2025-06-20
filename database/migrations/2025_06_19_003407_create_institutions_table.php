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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rut');
            $table->foreignId('region_id')->constrained()->onDelete('cascade'); // puede omitirse pero lo deje por requerimiento solicitado "tiene region"
            $table->foreignId('commune_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->string('phone'); // asumimos que solo tenemos telefonos en chile (lo que validaremnos 9 digitos && comienza por 9 )
            $table->unsignedBigInteger('created_by');
            $table->date('start_date');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade'); // asignamos un responsable de la creacion referencia a user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};