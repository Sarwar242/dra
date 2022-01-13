<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'roll', 'reg_no', 'email', 'address', 'session', 'department_id', 'batch_id'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

}
