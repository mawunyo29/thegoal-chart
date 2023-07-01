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
        Schema::create('caches', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('data');
            $table->string('Model_type')->nullable();
            $table->integer('expiration');
            $table->boolean('is_permanent')->default(false);
            $table->boolean('is_encrypted')->default(false);
            $table->boolean('is_compressed')->default(false);
            $table->boolean('is_json')->default(false);
            $table->boolean('is_base64')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caches');
    }
};
