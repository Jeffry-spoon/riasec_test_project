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
        Schema::create('users_details', function (Blueprint $table) {
           $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('education_level');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('phone_number')->nullable();
            $table->string('school_name')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->string('occupation_desc')->nullable();
            $table->timestamps(); // Use timestamps without arguments
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_details');
    }
};
