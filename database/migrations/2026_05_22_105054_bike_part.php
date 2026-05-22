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
        Schema::create('bike_part', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('bike_id')->nullable()->constrained('bikes')->onDelete('cascade');
            $table->foreignId('part_id')->nullable()->constrained('parts')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_part');
    }
};
