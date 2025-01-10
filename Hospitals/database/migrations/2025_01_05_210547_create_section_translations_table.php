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
        Schema::create('section_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete(); // المفتاح الخارجي
            $table->string('locale')->index(); // اللغة (مثل en أو ar)
            $table->string('name'); // الاسم المترجم
            $table->unique(['section_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_translations');
    }
};
