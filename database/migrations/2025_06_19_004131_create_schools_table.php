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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade'); // puede omitirse pero lo deje por requerimiento solicitado "tiene region"
            $table->foreignId('commune_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('rut');
            $table->string('address');
            $table->integer('phone');
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('schools');
    }
};
