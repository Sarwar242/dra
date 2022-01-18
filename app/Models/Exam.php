<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'year', 'batch_id', 'status'
    ];
    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function courses()
    {
        return $this->hasMany(ExamCourse::class);
    }
    public function results()
    {
        return $this->hasMany(Rank::class);
    }
    public function courses2()
    {
        $courses = Course::leftJoin('exam_courses', 'exam_courses.course_id', '=', 'courses.id')
        ->select(['courses.id','courses.name','courses.code','exam_courses.exam_id'])->get();
        return $courses;
    }
}
