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
        Schema::table('clients',function(Blueprint $table){
            $table->string('CF',16);
            $table->string('name',20)->change();
            $table->string('surname',30)->change();
            $table->date('birth_date')->nullable()->change();
            $table->string('city_residence',20)->nullable()->change();
            $table->string('address_residence',50)->nullable()->change();
            $table->integer('phone_number')->nullable()->change();
            $table->string('email',50)->nullable()->change();
            $table->binary('med_cert')->nullable()->change();
            $table->date('med_cert_exp')->nullable()->change();
            $table->date('free_entry')->nullable()->change();
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
