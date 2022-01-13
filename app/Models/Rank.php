<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    public $fillable = [
        'gpa', 'credit', 'batch_id', 'department_id', 'student_id', 'exam_id'
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
}
