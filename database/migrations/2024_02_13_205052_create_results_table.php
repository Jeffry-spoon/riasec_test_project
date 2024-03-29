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
        Schema::create('results', function (Blueprint $table) {
            $table->uuid( 'id' )->primary();
            $table->foreignId('types_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->json('score');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->time('difference');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
