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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            // user reference
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // loan info
            $table->string('type')->default('loan'); // always loan
            $table->decimal('amount', 10, 2);

            // date
            $table->date('transaction_date');

            // optional note
            $table->text('note')->nullable();

            // status (optional but useful)
            $table->enum('status', ['pending', 'approved', 'paid'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
