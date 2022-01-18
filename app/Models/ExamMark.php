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

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function added_by()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
