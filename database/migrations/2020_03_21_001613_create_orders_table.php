<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->enum('payment_method', [
                'cash on delivery',
                'transfer'
            ]);
            $table->enum('status', [
                'menunggu konfirmasi',
                'terkonfirmasi',
                'terbayar',
                'sedang berjalan',
                'selesai',
                'batal'
            ])->default('menunggu konfirmasi');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('jalan');
            $table->string('address_notes');
            $table->unsignedBigInteger('user_id')
                ->foreign()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')
                ->foreign()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('package_id')
                ->foreign()
                ->references('id')
                ->on('package')
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
        Schema::dropIfExists('orders');
    }
}
