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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('txtn_id');
            $table->decimal('amount', 12, 2);
            $table->decimal('balance', 12, 2);
            $table->string('type');

            $table->unsignedBigInteger('citizen_id'); // must match citizens.id type
            $table->foreign('citizen_id')->references('id')->on('citizens')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
