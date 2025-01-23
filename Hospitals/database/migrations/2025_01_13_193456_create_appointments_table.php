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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            // $table->string('name');
            // $table->string('email');
            // $table->string('phone');
            // $table->enum('type',['غير مؤكد','مؤكد','منتهي'])->default('غير مؤكد');
            // $table->dateTime('appointment')->nullable();
            // $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
