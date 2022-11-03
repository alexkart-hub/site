<?php

namespace App\Models;

use app\core\factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'preview_text',
        'detail_text',
        'thumbnail',
    ];

    public function comments()
    {
        $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
