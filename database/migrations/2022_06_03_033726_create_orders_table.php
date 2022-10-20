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
            $table->bigIncrements('order_id');
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('userdetails_id')->on('userdetails')->onDelete('cascade');
            $table->double('order_amount', 10, 2);
            $table->enum('order_status', ['Processing', 'Cancelled','Completed','Pending']);
            $table->string('center_name', 100);
            $table->string('contact_phone_no', 60);
            $table->string('contact_name', 25);
            $table->string('contact_email', 60);
            $table->string('delivery_address', 100);
            $table->bigInteger('payment_type')->unsigned();
            $table->foreign('payment_type')->references('paymenttype_id')->on('paymenttypes')->onDelete('cascade');
            $table->dateTime('date_of_order', $precision = 0);
            $table->dateTime('date_of_delivery', $precision = 0);
            $table->dateTime('created_at', $precision = 0);
            $table->dateTime('updated_at', $precision = 0);
            $table->integer('is_deleted')->default('0');




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
