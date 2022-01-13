<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'session', 'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
