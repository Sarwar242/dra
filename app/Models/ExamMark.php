<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamMark extends Model
{
    use HasFactory;
    public $fillable = [
        'cgpa', 'exam_position', 'batch_position', 'department_position', 'batch_id', 'department_id',
        'student_id', 'exam_id', 'course_id', 'user_id', 'total_marks'
    ];
}
