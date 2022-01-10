<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->id();
            $table->double('cgpa', 10, 2)->nullable();
            $table->unSignedInteger('exam_position')->nullable();
            $table->unSignedInteger('batch_position')->nullable();
            $table->unSignedInteger('department_position')->nullable();
            $table->unSignedBigInteger('batch_id')->nullable();
            $table->unSignedBigInteger('department_id')->nullable();
            $table->unSignedBigInteger('student_id')->nullable();
            $table->unSignedBigInteger('exam_id')->nullable();
            $table->unSignedBigInteger('course_id')->nullable();
            $table->unSignedBigInteger('user_id')->nullable();
            $table->double('total_marks', 10, 2)->nullable();

            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_marks');
    }
}
