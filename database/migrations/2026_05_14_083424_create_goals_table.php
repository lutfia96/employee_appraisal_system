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
        Schema::create('goals', function (Blueprint $table) {
             $table->id();
            $table->foreignId('employee_id')->constrained('employee')->onDelete('cascade');
            $table->string('title');
            $table->text('achievement'); 
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->foreignId('kpi_id')->constrained('kpis')->onDelete('cascade');
            $table->foreignId('appraisal_period_id')->constrained('appraisal_period')->onDelete('cascade');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goals');
    }
};
