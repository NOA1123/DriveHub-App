<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('carid');
            $table->string('name', 200);
            $table->string('image', 200);
            $table->integer('price');
            $table->text('description');
            $table->string('make', 200);
            $table->string('model', 200);
            $table->integer('year');
            $table->string('fuel_type', 200);
            $table->integer('seats');
            $table->string('transmission', 200);
            $table->string('air_conditioning', 10);
            $table->string('availability', 10)->default('True');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
