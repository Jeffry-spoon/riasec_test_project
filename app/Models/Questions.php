<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'questions_text',
        'types_id',
        'categories_id',
    ];

    public function type()
    {
        return $this->belongsTo(Types::class, 'types_id', 'id');
    }


}
