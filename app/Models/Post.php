<?php

namespace App\Models;

use app\core\factory;
use App\Services\Elastic\ElasticService;
use App\Services\Elastic\PostElastic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

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
        'is_published'
    ];
    protected $elastic;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->elastic = $this->getElastic();
    }

    public static function getElastic()
    {
        return PostElastic::instance();
    }

    public function comments()
    {
        if (auth('web')->user() && auth('web')->user()->name == 'admin') {
            $comments = $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
        } elseif (auth('web')->user()) {
            $comments = $this->hasMany(Comment::class)
                ->orderBy('created_at', 'desc')
                ->where('approved', '=', 1, 'and')
                ->where('user_id', '=', auth('web')->user()->id, 'or')
                ->where('post_id', $this->id);
        } else {
            $comments = $this->hasMany(Comment::class)
                ->orderBy('created_at', 'desc')
                ->where('approved', '=', 1);
        }
        return $comments;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function update(array $attributes = [], array $options = [])
    {
        $result = parent::update($attributes, $options);
        if ($result) {
                $this->elastic
                    ->setData($this)
                    ->update($attributes);
        }
        return $result;
    }

    public static function destroy($ids)
    {
        $isDestroy = parent::destroy($ids);
        if ((bool)$isDestroy) {
            self::getElastic()
                ->delete($ids);
        }
        return $isDestroy;
    }
}
