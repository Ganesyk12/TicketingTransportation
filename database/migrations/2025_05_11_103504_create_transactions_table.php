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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('IdTransactions');
            $table->string('CustomerName');
            $table->integer('CustomerAge');
            $table->integer('TicketQty');
            $table->unsignedBigInteger('IdTicketClass');
            $table->unsignedBigInteger('IdDestination');
            $table->date('DepartureDate');
            $table->string('UserCreated')->nullable();
            $table->timestamp('DateCreated')->nullable();
            $table->string('UserModified')->nullable();
            $table->timestamp('DateModified')->nullable();
            $table->string('Status')->nullable();
    
            // Foreign keys
            $table->foreign('IdTicketClass')->references('IdTicketClass')->on('ticket_classes');
            $table->foreign('IdDestination')->references('IdDestination')->on('destinations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
