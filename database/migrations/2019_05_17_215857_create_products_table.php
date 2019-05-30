<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('product_1_name')->nullable();
            $table->text('product_1_summary')->nullable();
            $table->string('product_2_name')->nullable();
            $table->text('product_2_summary')->nullable();
            $table->string('product_3_name')->nullable();
            $table->text('product_3_summary')->nullable();
            $table->string('product_4_name')->nullable();
            $table->text('product_4_summary')->nullable();
            $table->string('product_5_name')->nullable();
            $table->text('product_5_summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
