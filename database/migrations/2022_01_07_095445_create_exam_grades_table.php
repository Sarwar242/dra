<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unSignedBigInteger('grade_category_id')->nullable();
            $table->string('grade_point');
            $table->string('point_from');
            $table->string('point_to');
            $table->string('mark_from');
            $table->string('mark_upto');
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->foreign('grade_category_id')->references('id')->on('grade_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_grades');
    }
}
