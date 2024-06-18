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
        Schema::create('hospitais_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospitais_id');
            $table->foreign('hospitais_id')
                ->references('id')
                    ->on('hospitais')
                        ->onDelete('CASCADE') // Corrigi o erro de sintaxe aqui
                            ->onUpdate('CASCADE');
            $table->unsignedBigInteger('documentos_id');
            $table->foreign('documentos_id')
                ->references('id')
                    ->on('documentos') 
                        ->onDelete('CASCADE') // Corrigi o erro de sintaxe aqui
                            ->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizacao_documentos');
    }
};
