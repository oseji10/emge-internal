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
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('cost')->nullable();
            $table->unsignedInteger('hospital_id')->nullable();
            $table->unsignedInteger('period_id')->nullable();
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospital')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('period_id')->references('id')->on('period')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
