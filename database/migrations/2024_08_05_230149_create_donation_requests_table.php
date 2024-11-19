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
        Schema::create('donation_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('client_id');
			$table->string('patient_name');
			$table->integer('patient_age');
            $table->integer('blood_type_id');
			$table->integer('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->integer('city_id');
			$table->string('phone');
			$table->text('notes')->nullable();
			$table->decimal('latitude', 10,10)->nullable();
			$table->decimal('longitude', 10,10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_requests');
    }
};
