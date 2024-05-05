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
        Schema::create('cruds', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->integer('number');
            $table->string('checkbox');
            $table->enum('radio', ['yes', 'no']);
            $table->string('select');
            $table->date('date');
            $table->integer('range');
            $table->string('file');
            $table->string('color');
            $table->string('hidden');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cruds');
    }
};
