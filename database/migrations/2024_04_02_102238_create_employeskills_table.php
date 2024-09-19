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
        Schema::create('employeskills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employe_id')->unsigned();
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->string('employeskills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeskills');
    }
};
