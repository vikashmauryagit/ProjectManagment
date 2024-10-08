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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 200);
            $table->string('client', 30);
            $table->string('contact', 30);
            $table->date('startdate');
            $table->date('enddate');
            $table->foreignId('emp_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status', ['incomplete', 'complete'])->default('incomplete',);
            $table->text('employee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
