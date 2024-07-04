<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_service_bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('astro_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('booking_number');
            $table->string('booking_product_service_name');
            $table->decimal('price')->default('0.00');
            $table->enum('status',['Onhold','Confirmed','Pending','Payment Pending','Payment Confirmed','Cancelled','Completed','Booking Failed'])->default('Pending');
            $table->enum('service_status',['Not Started','Ongoing','Completed','Cancelled'])->default('Not Started');
            $table->enum('booking_payment_type',['Online','Offline']);
            $table->enum('payment_status',['Paid','Unpaid','Payment Fail'])->default('Payment Fail');
            $table->date('service_date')->nullable();
            $table->string('service_time')->nullable();
            $table->string('booking_category')->nullable();
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
        Schema::dropIfExists('product_service_bookings');
    }
};
