<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('trademark_applications', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('trademark_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('status')->default('draft');
            $table->integer('current_step')->default(1);

            $table->string('trademark_type')->nullable();
            $table->string('trademark_text')->nullable();

            $table->string('logo_name')->nullable();
            $table->text('logo_description')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->boolean('sms_consent')->default(false);

            $table->string('plan')->nullable();
            $table->json('addons')->nullable();
            $table->string('priority')->nullable();
            $table->integer('total')->default(0);

            $table->string('promo_code')->nullable();
            $table->integer('discount')->default(0);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trademark_applications');
    }
};
