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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id('IdDestination');
            $table->string('DestinationName');
            $table->string('UserCreated')->nullable();
            $table->timestamp('DateCreated')->nullable();
            $table->string('UserModified')->nullable();
            $table->timestamp('DateModified')->nullable();
            $table->string('Status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
