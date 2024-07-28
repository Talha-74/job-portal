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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_region');
            $table->string('job_type');
            $table->string('company');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('salary');
            $table->string('gender');
            $table->string('category');
            $table->date('application_deadline');
            $table->text('job_description');
            $table->text('responsibilities');
            $table->text('education_experience');
            $table->text('other_benefits');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
