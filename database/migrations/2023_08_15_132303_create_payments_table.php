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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->text('command');
            $table->string('curr_code');
            $table->text('ip_addr');
            $table->string('locale');
            $table->text('order_info');
            $table->string('order_type');
            $table->string('order_code');
            $table->string('bank_code');
            $table->datetime('create_date');
            $table->datetime('expire_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
