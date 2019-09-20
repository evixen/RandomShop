<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->unsigned();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('menu_level');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_categories');
    }
}
