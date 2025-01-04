<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Protect the primary key to not be incremented
    protected $primaryKey = 'id';

    // Define the inverse relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
