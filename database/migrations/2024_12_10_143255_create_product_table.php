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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->unsignedBigInteger('id_category');
            $table->string('code_product');
            $table->string('name_product');
            $table->string('slug_product');
            $table->text('description_product');
            $table->double('quantity', 12, 2)->default(0);
            $table->string('per_unit');
            $table->double('price', 12, 2)->default(0);
            $table->enum('status', ['publish','notpublish'])->default('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
