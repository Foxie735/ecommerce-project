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
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id_cart');
            $table->unsignedBigInteger('id_user');
            $table->string('no_invoice');
            $table->enum('status_cart', ['process', 'checkout']);
            $table->enum('payment_status', ['paid', 'notpaid']);
            $table->enum('delivery_status', ['done', 'notdone']);
            $table->string('no_receipt')->nullable();
            $table->string('expedition')->nullable();
            $table->double('subtotal')->default(0);
            $table->double('shipping_cost')->default(0);
            $table->double('total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
