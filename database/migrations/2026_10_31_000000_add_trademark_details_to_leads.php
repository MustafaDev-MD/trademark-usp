<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->json('trademark_types')->nullable();
            $table->string('trademark_name')->nullable();
            $table->string('trademark_slogan', 500)->nullable();
            $table->string('logo_path')->nullable();
            $table->string('selected_plan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'trademark_types', 'trademark_name', 'trademark_slogan', 'logo_path', 'selected_plan']);
        });
    }
};
