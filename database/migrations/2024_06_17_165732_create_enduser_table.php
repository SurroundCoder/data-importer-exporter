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
        Schema::create('enduser', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('full_name', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->tinyInteger('is_deleted')->default(0);
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->integer('deleted_at')->nullable();
            $table->string('deleted_by', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enduser');
    }
};
