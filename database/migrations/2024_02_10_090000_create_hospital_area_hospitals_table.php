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
        Schema::create('hospital_area_hospitais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('hospital_area_id');
            $table->foreign('hospital_id')->references('id')->on('hospitais')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('hospital_area_id')->references('id')->on('hospital_areas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_area_hospitals');
    }
};
