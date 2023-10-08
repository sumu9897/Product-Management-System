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
        Schema::create('assigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_serial');
            $table -> string ('product_name');
            $table->unsignedBigInteger('user_id');
            $table-> string ('user_name');
            $table->date('adate');
            $table->string('status')->nullable();
            $table->date('rdate')->nullable();
            $table->timestamps();

            // Foreign key constraints
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           // $table->foreign('product_serial')->references('serial')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigns');
    }
};
