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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',50);
            $table->string('company_img');
            $table->string('location',50);
            $table->string('email',50)->unique();
            $table->string('mobile',50);
            $table->string('password',50);
            $table->string('otp',10);
            $table->string('status',50)->default('pending');
            $table->string('role',50)->default('manager');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
