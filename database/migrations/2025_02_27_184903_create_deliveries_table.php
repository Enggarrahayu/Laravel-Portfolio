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
            $table->string('destination', 100);
            $table->integer('total_cost');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->uuid('delivery_route_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('delivery_route_id')->references('id')->on('delivery_routes')->onDelete('cascade');
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
