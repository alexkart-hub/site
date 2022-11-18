<?php

namespace App\Models;

use app\core\factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'code',
        'preview_text',
        'detail_text',
        'thumbnail',
    ];

    public function comments()
    {
        if (auth('web')->user() && auth('web')->user()->name == 'admin') {
            $comments = $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
        } else {
            $comments = $this->hasMany(Comment::class)
                ->orderBy('created_at', 'desc')
                ->where('approved', 1);
        }
        return $comments;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
