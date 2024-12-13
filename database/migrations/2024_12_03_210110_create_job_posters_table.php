<?php

use App\Models\City;
use App\Models\CompanySize;
use App\Models\Industry;
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
        Schema::create('job_posters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('company_name');
            $table->string('pib', 13)->unique();
            $table->string('registration_number', 8)->unique();
            $table->foreignIdFor(Industry::class)->constrained();
            $table->string('registration');
            $table->string('phone_number', 20)->unique();
            $table->string('country');
            $table->foreignIdFor(City::class)->constrained();;
            $table->string('postal_code');
            $table->string('company_address');
            $table->string('owner_name');
            $table->string('owner_last_name');
            $table->foreignIdFor(CompanySize::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posters');
    }
};
