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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('remitente_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('destinatario_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('asunto', 255)->nullable();
            $table->string('mensaje', 255)->nullable();
            $table->boolean('leido')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
