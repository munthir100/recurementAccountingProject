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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('amount');
            $table->string('location')->nullable();
            $table->string('renewal_terms')->nullable();
            $table->enum('amount_type', ['monthly', 'daily', 'weekly', 'annually']);
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('status_id')->constrained('statuses');
            $table->morphs('contractable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
