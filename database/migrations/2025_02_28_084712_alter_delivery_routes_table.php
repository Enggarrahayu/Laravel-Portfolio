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
        Schema::table('delivery_routes', function (Blueprint $table) {
            // Add new fields
            $table->decimal('weight_base_price', 10, 2);
            $table->decimal('volume_base_price', 10, 2);

            // Drop the old field
            $table->dropColumn('base_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_routes', function (Blueprint $table) {
            // Revert: Add back base_price
            $table->decimal('base_price', 10, 2);

            // Remove new fields
            $table->dropColumn(['weight_base_price', 'volume_base_price']);
        });
    }
};
