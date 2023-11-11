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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            //Jika ingin penamaan custom (1.)
            //$table->primary('biodata_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('about_me')->default('');
            $table->string('address')->default('');
            $table->string('website')->default('');
            $table->string('instagram')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};