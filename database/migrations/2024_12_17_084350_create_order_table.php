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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id_order');
            $table->unsignedBigInteger('id_cart');
            $table->string('nama_penerima');
            $table->string('telephone');
            $table->text('address');
            $table->string('province');
            $table->string('city');
            $table->string('subdistrict');
            $table->string('ward');
            $table->string('postal_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
