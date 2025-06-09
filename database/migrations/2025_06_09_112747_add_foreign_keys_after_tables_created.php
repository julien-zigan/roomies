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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('set null');
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->foreign('main_tenant_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('apartment_id')
                ->references('id')->on('apartments')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
        });

        Schema::table('apartments', function (Blueprint $table) {
            $table->dropForeign(['main_tenant_id']);
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['apartment_id']);
        });
    }
};
