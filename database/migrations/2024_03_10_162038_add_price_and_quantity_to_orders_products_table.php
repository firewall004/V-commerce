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
        Schema::table('orders_products', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->after('product_id');
            $table->unsignedInteger('quantity')->default(1)->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders_products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('quantity');
        });
    }
};
