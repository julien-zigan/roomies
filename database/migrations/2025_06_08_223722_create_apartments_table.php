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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->string('house_number');
            $table->string('postal_code');
            $table->string('city');
            $table->unsignedBigInteger('main_tenant_id')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('mixed_gender')->default(1);
            $table->tinyInteger('pets_allowed')->default(0);
            $table->decimal('square_meters', 10,2);
            $table->integer('num_of_rooms');
            $table->tinyInteger('seeking_roomie')->default(0);
            $table->dateTime('seeking_updated_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
