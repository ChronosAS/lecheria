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
        Schema::create('citizens',function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('civil_status');
            $table->date('birthdate');
            $table->string('nationality');
            $table->string('document')->unique();
            $table->string('address', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('citizens');
    }
};
