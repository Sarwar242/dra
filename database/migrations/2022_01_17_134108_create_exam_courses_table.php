<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_courses', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('exam_id')->nullable();
            $table->unSignedBigInteger('course_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('exam_courses');
    }
}
