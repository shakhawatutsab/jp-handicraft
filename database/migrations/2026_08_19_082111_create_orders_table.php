<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('phone', 11)->index();
            $table->text('address');
            $table->string('product_id', 32);
            $table->string('product_title');
            $table->unsignedInteger('price');
            $table->string('delivery_area', 16);
            $table->unsignedInteger('delivery_fee');
            $table->unsignedInteger('total');
            $table->string('status', 24)->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};