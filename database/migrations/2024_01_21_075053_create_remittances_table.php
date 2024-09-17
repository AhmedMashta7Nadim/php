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
        Schema::create('remittances', function (Blueprint $table) {
            $table->id();
            $table->integer('num_Remitten');
            $table->unsignedBigInteger('sending_Office');
            $table->unsignedBigInteger('Future_Office');
            $table->integer('Amount_Trens');
            $table->date('date')->nullable();
            $table->timestamps();
          
        $table->foreign('sending_Office')->references('id')->on('officars');
        
        $table->foreign('Future_Office')->references('id')->on('officars');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remittances');
    }
};
