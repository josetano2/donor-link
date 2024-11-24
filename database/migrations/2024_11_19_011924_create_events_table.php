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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->integer('max_capacity');
            $table->string('location');
            $table->text('description');
            $table->string('contact_number');
            $table->string('contact_person');
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospitals')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
