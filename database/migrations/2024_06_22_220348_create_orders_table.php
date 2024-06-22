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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['Completed', 'Late', 'In Progress', 'Warning', 'Ready', 'Served', 'Canceled']);
            $table->foreignId('table_id')->constrained()->onDelete('cascade');
            $table->text('note')->nullable();
            $table->decimal('total', 8, 2);
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->enum('mode', ['DineIn', 'Takeaway']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
