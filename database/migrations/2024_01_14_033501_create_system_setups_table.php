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
        Schema::create('system_setups', function (Blueprint $table) {
            $table->id();
            $table->decimal('package_srp', 8, 2);
            $table->decimal('package_expense', 8, 2);
            $table->decimal('direct_referall', 8, 2);
            $table->decimal('personal_so', 8, 2);
            $table->decimal('indirect_so', 8, 2);
            $table->decimal('perfect_structure', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_setups');
    }
};
