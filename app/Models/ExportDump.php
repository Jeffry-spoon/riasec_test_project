<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExportDump extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'result_id', // Add result_id here
        'name',
        'score',
        'description',
    ];
}