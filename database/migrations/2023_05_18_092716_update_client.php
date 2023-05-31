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
            $table->string('name');
            $table->string('surname');
            $table->date('birth_date');
            $table->string('city_residence');
            $table->string('address_residence');
            $table->integer('phone_number');
            $table->string('email');
            $table->binary('med_cert');
            $table->date('med_cert_exp');
            $table->date('free_entry');
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
