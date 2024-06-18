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
        Schema::create('livro_pontos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicos_id');
            $table->foreign('medicos_id')
                    ->references('id')
                    ->on('medicos') 
                    ->onDelete('CASCADE') 
                    ->onUpdate('CASCADE');
            $table->dateTime('entrada');
            $table->dateTime('saida')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_pontos');
    }
};
