<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Review extends Model
{
    protected $fillable = ['username', 'product_name', 'review', 'user_id'];
    public function reactions()
{
    return $this->hasMany(ReviewReaction::class);
}

public function likesCount()
{
    return $this->reactions()->where('reaction', 'like')->count();
}

public function dislikesCount()
{
    return $this->reactions()->where('reaction', 'dislike')->count();
}

}
