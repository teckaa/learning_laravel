<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->text('invoice_content');
            $table->string('invoice_total_balance');
            $table->string('invoice_date');
            $table->string('invoice_time');
            $table->string('customer');
            $table->string('customer_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('created_datetime');
            $table->string('created_date');
            $table->string('created_time');
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
        Schema::dropIfExists('invoices');
    }
}
