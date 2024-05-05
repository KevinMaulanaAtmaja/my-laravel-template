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
        Schema::create('modal_cruds', function (Blueprint $table) {
            $table->id();
            $table->string('text_input');
            $table->integer('number_input');
            $table->string('file_input')->nullable();
            $table->enum('dropdown_input', ['option1', 'option2', 'option3']);
            $table->date('date_input');
            $table->string('color_input');
            $table->enum('radio_input', ['yes', 'no']);
            $table->string('hidden_input')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modal_cruds');
    }
};
