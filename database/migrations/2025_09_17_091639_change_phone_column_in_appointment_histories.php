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
        Schema::table('appointment_histories', function (Blueprint $table) {
             $table->renameColumn('owner_phone', 'contact'); 

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointment_histories', function (Blueprint $table) {
            $table->renameColumn('contact', 'owner_phone'); 
        });
    }
};
 