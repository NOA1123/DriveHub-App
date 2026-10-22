<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('bookingid');
            $table->unsignedInteger('userid');
            $table->unsignedInteger('carid');
            $table->date('startdate');
            $table->date('enddate');
            $table->integer('totalcost');

            $table->foreign('userid')
                ->references('userid')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('carid')
                ->references('carid')
                ->on('cars')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
