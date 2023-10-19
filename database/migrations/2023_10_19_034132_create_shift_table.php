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
        Schema::create('shift', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();  // Add 'name' column
            $table->string('serial')->nullable();  // Add 'serial' column
            $table->string('SBU')->nullable();  // Add 'sbu' column
            $table->string('Now_SBU')->nullable();  // Add 'Now_SBU' column
            $table->date('Shift_Date')->nullable();  // Add 'Shift_Date' column
            $table->string('Shift_by')->nullable();  // Add 'Shift_by' column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift');
    }
};
