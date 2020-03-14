<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionalMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optional_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('category');
            $table->integer('price');
            $table->unsignedBigInteger('menu_id')
                ->foreign()
                ->references('id')
                ->on('menus')
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
        Schema::dropIfExists('optional_menus');
    }
}
