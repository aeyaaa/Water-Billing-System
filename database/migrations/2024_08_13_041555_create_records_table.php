<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cu_m')->nullable();
            $table->integer('present')->nullable();
            $table->integer('previous')->nullable();
            $table->integer('current')->nullable();
            $table->integer('arrears')->nullable();
            $table->integer('total')->nullable();
            $table->integer('payment_current')->nullable();
            $table->string('payment_remarks')->nullable();
            $table->date('date_paid')->nullable();
            $table->string('or_number')->nullable();
            $table->integer('bal')->nullable();
            $table->foreignId('month_id')->constrained('months');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
