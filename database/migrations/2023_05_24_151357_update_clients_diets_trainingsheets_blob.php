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
        Schema::table('clients', function (Blueprint $table) {
            $table -> string('med_cert',500)->change();
        });

        Schema::table('diets', function (Blueprint $table) {
            $table -> string('diet',500)->change();
        });

        Schema::table('training_sheets', function (Blueprint $table) {
            $table -> string('TrainingSheet',500)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
