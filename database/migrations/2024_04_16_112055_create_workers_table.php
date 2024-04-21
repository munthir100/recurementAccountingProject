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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job');
            $table->decimal('month_salary', 8, 2);
            $table->integer('contract_period');
            $table->json('languages');
            $table->string('nationality');
            $table->integer('age');
            $table->string('type');
            $table->string('tall');
            $table->string('religion');
            $table->string('place_of_birth');
            $table->integer('children');
            $table->string('education');
            $table->date('birth_date');
            $table->string('weight');
            $table->boolean('has_practical_experience');
            $table->json('practical_experience');
            $table->string('work_experience_country');
            $table->integer('years_of_experience');
            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
            $table->foreignId('status_id')->default(Status::ACTIVE)->constrained();
            $table->foreignId('cv_id')->nullable()->constrained()->nullOnDelete();
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
