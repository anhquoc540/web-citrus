<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();
            $table->string('order_type');
            $table->integer('amount');
            $table->text('order_info');
            $table->string('response_code');
            $table->string('transaction_no');
            $table->string('bank_code');
            $table->datetime('pay_date');
            $table->integer('status');    // 1 success, 0 failure, 2 chữ kí không hợp lệ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
};
