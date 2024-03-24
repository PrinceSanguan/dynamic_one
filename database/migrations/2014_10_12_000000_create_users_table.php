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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('work');
            $table->string('address');
            $table->string('gender');
            $table->string('password');
            $table->string('number');
            $table->integer('point')->default(0);
            $table->enum('status', ['deactivate', 'active'])->default('deactivate');
            $table->enum('type', ['programmer', 'ceo', 'coceo', 'activator', 'headadmin', 'admin', 'player'])->nullable();
            $table->enum('level', ['starter', 'premium'])->nullable();
            $table->unsignedBigInteger('referral_id')->nullable();
            $table->timestamps();

            // Add foreign key constraint for referral_id
            $table->foreign('referral_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
