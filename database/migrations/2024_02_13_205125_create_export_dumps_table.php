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
        Schema::create('export_dumps', function (Blueprint $table) {
            $table->id();
            $table->uuid('result_id'); // Mengganti kolom result_id menjadi UUID
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade'); // Mengubah keterkaitan menjadi UUID
            $table->string('name');
            $table->string('school_name');
            $table->string('grade');
            $table->string('event');
            $table->json('score');
            $table->json('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('export_dumps');
    }
};
