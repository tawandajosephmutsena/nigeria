<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petition_signers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('role')->default('citizen'); // citizen, healthcare_worker, policymaker
            $table->text('comment')->nullable();
            $table->boolean('is_verified')->default(true);
            $table->timestamps();

            $table->index(['role', 'state']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petition_signers');
    }
};
