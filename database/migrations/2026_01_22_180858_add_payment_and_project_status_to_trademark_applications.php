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
        Schema::table('trademark_applications', function (Blueprint $table) {
            // if (!Schema::hasColumn('trademark_applications', 'payment_status')) {
            //     $table->string('payment_status')->default('unpaid');
            // }

            // if (!Schema::hasColumn('trademark_applications', 'project_status')) {
            //     $table->string('project_status')->default('pending');
            // }

            // if (!Schema::hasColumn('trademark_applications', 'paid_amount')) {
            //     $table->decimal('paid_amount', 10, 2)->default(0);
            // }
            // $table->decimal('plan_price', 10, 2)->default(0);
            // $table->decimal('addons_price', 10, 2)->default(0);
            // $table->decimal('priority_price', 10, 2)->default(0);
            // $table->decimal('subtotal', 10, 2)->default(0);
            // $table->decimal('discount', 10, 2)->default(0);
            // $table->string('promo_code')->nullable();
            // $table->decimal('total', 10, 2)->default(0);
           
            if (!Schema::hasColumn('trademark_applications', 'payment_status')) {
                $table->string('payment_status')->default('unpaid');
            }

            if (!Schema::hasColumn('trademark_applications', 'project_status')) {
                $table->string('project_status')->default('pending');
            }

            if (!Schema::hasColumn('trademark_applications', 'paid_amount')) {
                $table->decimal('paid_amount', 10, 2)->default(0);
            }

            if (!Schema::hasColumn('trademark_applications', 'plan_price')) {
                $table->decimal('plan_price', 10, 2)->default(0);
            }

            if (!Schema::hasColumn('trademark_applications', 'addons_price')) {
                $table->decimal('addons_price', 10, 2)->default(0);
            }

            if (!Schema::hasColumn('trademark_applications', 'priority_price')) {
                $table->decimal('priority_price', 10, 2)->default(0);
            }

            if (!Schema::hasColumn('trademark_applications', 'subtotal')) {
                $table->decimal('subtotal', 10, 2)->default(0);
            }

            if (!Schema::hasColumn('trademark_applications', 'discount')) {
                $table->decimal('discount', 10, 2)->default(0);
            }

            if (!Schema::hasColumn('trademark_applications', 'promo_code')) {
                $table->string('promo_code')->nullable();
            }

            if (!Schema::hasColumn('trademark_applications', 'total')) {
                $table->decimal('total', 10, 2)->default(0);
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trademark_applications', function (Blueprint $table) {
            $columns = [
                'payment_status',
                'project_status',
                'paid_amount',
                'plan_price',
                'addons_price',
                'priority_price',
                'subtotal',
                'discount',
                'promo_code',
                'total',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('trademark_applications', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
