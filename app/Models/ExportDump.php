<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportDump extends Model
{
    use HasFactory;

    protected $fillable = [
        'result_id', // Add result_id here
        'name',
        'score',
        'description',
    ];
}