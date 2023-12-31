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
            $table->string('month_year');
            $table->integer('electric_bill');
            $table->integer('gas_bill');
            $table->integer('water_bill');
            $table->integer('internet_bill');
            $table->integer('dish_bill');
            $table->integer('other_expense');
            $table->integer('total_bill');
            $table->integer('total_members');
            $table->integer('member_id');
            $table->integer('total_meal');
            $table->integer('meal_rate');
            $table->integer('meal_expense');
            $table->integer('meal_deposit');
            $table->integer('meal_balance');
            $table->integer('service_charge');
            $table->integer('seat_rent');
            $table->integer('employee_salary');
            $table->integer('member_wise_employee_salary');
            $table->integer('payable_amount');
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
