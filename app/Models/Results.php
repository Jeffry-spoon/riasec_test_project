<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Results extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'user_id',
        'types_id',
        'event_id',
        'start_time',
        'end_time',
        'difference',
        'score',
        'slug'
    ];
}
