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
        Schema::create('hospital_servico_hospitais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('hospital_servico_id');
            $table->foreign('hospital_id')->references('id')->on('hospitais')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('hospital_servico_id')->references('id')->on('hospital_servicos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_servico_hospitals');
    }
};
