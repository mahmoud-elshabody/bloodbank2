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
    Schema::create('client_notification', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('notification_id');
			$table->integer('client_id');
			$table->boolean('is_read')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_notification');
    }
};
