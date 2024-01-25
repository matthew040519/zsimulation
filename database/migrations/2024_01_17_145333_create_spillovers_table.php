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
        Schema::create('spillovers', function (Blueprint $table) {
            $table->id();
            $table->text('username_bonus');
            $table->text('username');
            $table->decimal('commission', 8, 2);
            $table->integer('level');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spillovers');
    }
};
