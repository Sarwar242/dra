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
}
