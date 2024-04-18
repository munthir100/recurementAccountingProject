<?php

use App\Models\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('job')->nullable();
            $table->decimal('month_salary', 8, 2)->nullable();
            $table->integer('contract_period')->nullable();
            $table->json('languages')->nullable();
            $table->string('nationality')->nullable();
            $table->integer('age')->nullable();
            $table->string('type')->nullable();
            $table->string('tall')->nullable();
            $table->string('religion')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->integer('children')->nullable();
            $table->string('education')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('weight')->nullable();
            $table->boolean('has_practical_experience')->nullable();
            $table->json('practical_experience')->nullable();
            $table->string('work_experience_country')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
            $table->foreignId('status_id')->default(Status::ACTIVE)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
