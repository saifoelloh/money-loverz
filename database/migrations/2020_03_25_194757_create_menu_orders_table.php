<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('total')->default(1);
            $table->date('antar');
            $table->enum('status', [
              'order',
              'cancel',
              'done'
            ])->default('order');
            $table->string('note');
            $table->unsignedBigInteger('menu_id')
                ->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');
            $table->unsignedBigInteger('order_id')
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('menu_orders');
    }
}
