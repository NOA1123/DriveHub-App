<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('featureid');
            $table->unsignedInteger('carid');
            $table->string('feature', 200);

            $table->foreign('carid')
                ->references('carid')
                ->on('cars')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
