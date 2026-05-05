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
        Schema::create('client_applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('owner_of_mark');
            $table->string('dba')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_nature');
            $table->string('mailing_address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip_code');
            $table->string('phone_number');
            $table->string('website')->nullable();
            $table->string('email_address');
            $table->string('trademark_type');
            $table->string('mark_details')->nullable();
            $table->text('business_description');
            $table->string('using_logo')->default('No');
            $table->string('logo_file')->nullable(); // path store hoga
            $table->string('usage_list')->nullable();
            $table->date('date_of_use')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_applications');
    }
};
