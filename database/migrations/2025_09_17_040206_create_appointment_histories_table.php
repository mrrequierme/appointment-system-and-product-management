<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointment_histories', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_phone');

            $table->string('pet_name');
            $table->string('pet_gender');
            $table->string('pet_breed');
            $table->string('pet_type');
            $table->date('pet_birthday');
            $table->string('pet_color');

            $table->date('date');
            $table->time('time');
            $table->string('services');
            $table->string('status'); 

            $table->string('staff_name');
            $table->string('staff_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_histories');
    }
};
