<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyinteger('rate')->nullable();
            $table->integer('sold')->default(0);
            $table->integer('sale_off')->default(0);
            $table->boolean('is_public')->default(1);
            $table->text('description')->nullable();
            $table->biginteger('user_id');
            $table->biginteger('brand_id')->nullable();
            $table->biginteger('category_id')->nullable();
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
