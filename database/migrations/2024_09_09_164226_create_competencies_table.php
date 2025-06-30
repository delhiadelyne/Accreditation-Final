<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('competencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });

        Schema::create('competency_training_program', function (Blueprint $table) {
            $table->unsignedBigInteger('competency_id');
            $table->unsignedBigInteger('training_program_id');
            $table->timestamps();

            $table->foreign('competency_id')->references('id')->on('competencies')->onDelete('cascade');
            $table->foreign('training_program_id')->references('id')->on('training_programs')->onDelete('cascade');
            $table->primary(['competency_id', 'training_program_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('competency_training_program');
        Schema::dropIfExists('competencies');
    }
};
