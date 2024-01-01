<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Types extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_name',
        'is_active',
    ];

   public function questions()
    {
        return $this->hasMany(Questions::class, 'types_id', 'id');
    }

}
