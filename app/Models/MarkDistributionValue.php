<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkDistributionValue extends Model
{
    use HasFactory;
    public $fillable = [
        'title', 'marks', 'mark_distribution_id', 'batch_id', 'department_id', 'student_id',
        'exam_id', 'mark_id', 'course_id',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function mark()
    {
        return $this->belongsTo(ExamMark::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function mark_distribution()
    {
        return $this->belongsTo(MarkDistribution::class);
    }
}
