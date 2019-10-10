<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->unsignedBigInteger('user_id');
            $table->float('price');
            $table->string('receiver_name');
            $table->string('email');
            $table->text('address');
            $table->bigInteger('phone');
            $table->text('comment')->nullable();
            $table->boolean('is_checked')->default(false);
            $table->boolean('is_paid')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index('is_checked');
            $table->index('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
}
