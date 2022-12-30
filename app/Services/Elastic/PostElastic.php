<?php
namespace App\Services\Elastic;

use App\Models\Post;

class PostElastic extends ElasticService
{
    protected Post $post;

    public function setData(Post $post): PostElastic
    {
        $this->post = $post;
        return $this;
    }

    protected function getCrudPath($id = ''): string
    {
        return parent::getPath() . self::TYPE . ($this->post->id ?? $id);
    }
}
