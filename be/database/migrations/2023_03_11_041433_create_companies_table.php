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
            $table->uuid('id')->primary()->nullable(false);
            $table->string('link')->unique();
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->string('description');
            $table->integer('address_id')->nullable(false);
            $table->string('detail_address')->nullable(false);
            $table->string('renumeration_policy');
            $table->string('tax_code')->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password');
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
