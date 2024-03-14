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
            $table->string('title');
            
            $table->unsignedBigInteger('company_id');

            $table->foreign('company_id')->references('id')->on('companies')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories')
                    ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('jobtype_id');

            $table->foreign('jobtype_id')->references('id')->on('job_types')
                        ->cascadeOnUpdate()->restrictOnDelete();

            $table->string('vacancy');
            $table->string('salary');
            $table->string('location');
            $table->string('description');
            $table->string('benefits');
            $table->string('experience');
            $table->string('responsibility');
            $table->string('qualification');
            $table->string('keyword');
            $table->string('company_name');
            $table->string('company_location');
            $table->string('website');
            $table->string('published_date');

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
