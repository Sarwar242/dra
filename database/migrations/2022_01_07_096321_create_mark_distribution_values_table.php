<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkDistributionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_distribution_values', function (Blueprint $table) {
            $table->id();
            $table->double('marks', 10, 2)->nullable();
            $table->unSignedBigInteger('mark_distribution_id')->nullable();
            $table->unSignedBigInteger('batch_id')->nullable();
            $table->unSignedBigInteger('department_id')->nullable();
            $table->unSignedBigInteger('student_id')->nullable();
            $table->unSignedBigInteger('exam_id')->nullable();
            $table->unSignedBigInteger('mark_id')->nullable();
            $table->unSignedBigInteger('course_id')->nullable();
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('mark_distribution_id')->references('id')->on('mark_distributions')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('mark_id')->references('id')->on('exam_marks')->onDelete('cascade');
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
        Schema::dropIfExists('mark_distribution_values');
    }
}
