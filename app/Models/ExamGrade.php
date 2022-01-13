<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGrade extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'grade_point', 'point_from', 'point_to', 'mark_from', 'mark_upto', 'comment', 'grade_category_id'
    ];

    public function grade_category(){
        return $this->belongsTo(GradeCategory::class);
    }
}
