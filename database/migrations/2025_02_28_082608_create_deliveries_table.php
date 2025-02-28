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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('total_cost');
            $table->enum('status', ['in_progress', 'completed'])->default('in_progress');
            $table->uuid('delivery_route_id');
            $table->uuid('order_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('delivery_route_id')->references('id')->on('delivery_routes')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
