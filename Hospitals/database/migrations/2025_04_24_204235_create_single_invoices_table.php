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
        Schema::create('single_invoices', function (Blueprint $table) {
             $table->id();
             $table->date('invoice_date');
             $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
             $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
             $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
             $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
             $table->double('price', 8, 2)->default(0);
             $table->double('discount_value', 8, 2)->default(0);
             $table->string('tax_rate');
             $table->string('tax_value');
             $table->double('total_with_tax', 8, 2)->default(0);
             $table->integer('type')->default(1);
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_invoices');
    }
};
