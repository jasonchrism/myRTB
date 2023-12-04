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
        Schema::create('book_machines', function (Blueprint $table) {
            $table->uuid('book_id')->nullable(false)->primary();
            $table->uuid('machine_id')->nullable(false);
            $table->string('NIP', 10)->nullable(false);
            $table->timestamp('start_time')->nullable(true);
            $table->timestamp('end_time')->nullable(true);
            $table->string('photo', 255)->nullable(true);
            $table->uuid('status_id')->nullable(false);

            $table->foreign('NIP')->on('users')->references('NIP');
            $table->foreign('machine_id')->on('washing_machines')->references('machine_id');
            $table->foreign('status_id')->on('status')->references('status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_machines');
    }
};
