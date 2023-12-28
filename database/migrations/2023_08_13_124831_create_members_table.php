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
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->string('member_first_name');
            $table->string('member_last_name');
            $table->text('member_institute');
            $table->string('member_voter_id');
            $table->string('member_mobile');
            $table->string('member_email');
            $table->longText('member_address');
            $table->text('member_image');

            $table->string('gurdian_name');
            $table->string('gurdian_voter_id');
            $table->string('gurdian_mobile');
            $table->string('gurdian_email')->nullable();
            $table->longText('gurdian_address');

            $table->string('local_gurdian_name')->nullable();
            $table->string('local_gurdian_occupation')->nullable();
            $table->string('local_gurdian_mobile')->nullable();
            $table->string('local_gurdian_email')->nullable();
            $table->longText('local_gurdian_address')->nullable();

            $table->tinyInteger('status')->default(1)->comment('1=Active, 0=Inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
