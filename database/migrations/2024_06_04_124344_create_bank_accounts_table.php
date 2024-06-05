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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('number')->nullable();
            $table->string('soft_code')->nullable();
            $table->string('bank_address')->nullable();
            
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('currency_id')->nullable()->references('id')->on('currencies')->onDelete('cascade');
            $table->foreignId('account_id')->nullable()->references('id')->on('accounts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
