<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkDistribution extends Model
{
    protected $table = 'mark_distributions';
    use HasFactory;
    public $fillable = [
        'title', 'mark'
    ];

}
