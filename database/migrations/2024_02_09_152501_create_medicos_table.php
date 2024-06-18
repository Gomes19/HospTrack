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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('genero');
            $table->string('vc_path');
            $table->unsignedBigInteger('especialidades_id');
            $table->foreign('especialidades_id')
                ->references('id')
                ->on('especialidades') 
                ->onDelete('CASCADE') 
                ->onUpdate('CASCADE');
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')
                    ->references('id')
                    ->on('hospital_areas') 
                    ->onDelete('CASCADE') 
                    ->onUpdate('CASCADE');
            $table->unsignedBigInteger('hospitais_id');
            $table->foreign('hospitais_id')
                    ->references('id')
                    ->on('hospitais') 
                    ->onDelete('CASCADE') 
                    ->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
