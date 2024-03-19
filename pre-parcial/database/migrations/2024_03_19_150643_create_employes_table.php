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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->ondelete('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->string('card');
            $table->date('start_date');
            $table->date('start_contract_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
