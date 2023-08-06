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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            $table->string('message');
            $table->integer('user_id');
            $table->string('level')->default('info');
            $table->string('channel')->default('local');
            $table->string('context')->nullable();
            $table->string('extra')->nullable();
            $table->string('formatted')->nullable();
            $table->string('remote_addr')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referrer')->nullable();
            $table->string('request_uri')->nullable();
            $table->string('http_method')->nullable();
            $table->string('server')->nullable();
            $table->string('cookies')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
