<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skin_type',
        'ingredients',
        'tips',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'tips' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

