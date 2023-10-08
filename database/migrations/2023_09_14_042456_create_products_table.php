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
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable();
        $table->string('model')->nullable();
        $table->string('status')->nullable();
        $table->text('document')->nullable();  // Assuming document is a longer text
        $table->string('SBU')->nullable();
        $table->string('serial', 7)->unique();
        $table->string('capacity')->nullable();
        $table->text('description')->nullable();  // Assuming description is a longer text
        $table->date('Purchase_Date')->nullable();
        $table->decimal('price', 10, 2)->nullable();  // Assuming price is a decimal
        $table->string('P_WG')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
