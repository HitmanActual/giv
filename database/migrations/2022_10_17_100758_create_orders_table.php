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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('order_number');
            $table->enum('status',['pending','processing','completed','cancelled'])->default('pending');
            $table->enum('payment_method',['paypal'])->default('paypal');
            $table->decimal('grand_total',20,6);
            $table->integer('item_count');
            $table->boolean('is_paid')->default(0);
            $table->text('notes')->nullable();
            $table->string('recipient_fullname');
            $table->string('recipient_phone');
            $table->string('recipient_state')->nullable();
            $table->text('recipient_address');
            $table->string('long');
            $table->string('lat');
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
};
