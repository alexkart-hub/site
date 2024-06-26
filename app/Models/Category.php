<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'title',
        'description',
        'level',
        'margin_left',
        'margin_right',
        'parent_id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)
            ->where('is_published', 1)
            ->orderBy('created_at', 'desc');
    }
}
