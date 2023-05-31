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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('surname',30);
            $table->date('birth_date')->nullable();
            $table->string('city_residence',20)->nullable();
            $table->string('address_residence',50)->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('email',50)->nullable();
            $table->unsignedBigInteger('id_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
