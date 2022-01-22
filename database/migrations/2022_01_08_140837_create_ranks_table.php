<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('batch_id')->nullable();
            $table->unSignedBigInteger('department_id')->nullable();
            $table->unSignedBigInteger('student_id')->nullable();
            $table->unSignedBigInteger('exam_id')->nullable();
            $table->unSignedInteger('failed')->default(0)->nullable();
            $table->string('status')->default("promoted")->nullable();
            $table->double('gpa', 10, 2)->nullable();
            $table->double('credit', 10, 2)->nullable();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}
