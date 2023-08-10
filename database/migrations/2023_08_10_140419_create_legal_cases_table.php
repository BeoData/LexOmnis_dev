<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('legal_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_number')->unique();
            $table->unsignedBigInteger('client_id');
            $table->string('status');
            $table->string('case_type');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
    
            $table->foreign('client_id')->references('id')->on('clients'); // Pretpostavljajući da imate tabelu klijenata
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_cases');
    }
};
