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
        Schema::create('meal_rates', function (Blueprint $table) {
            $table->id();
            $table->string('month_year');
            $table->bigInteger('total_meal_of_the_month');
            $table->bigInteger('total_grocery_of_the_month');
            $table->bigInteger('meal_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_rates');
    }
};
