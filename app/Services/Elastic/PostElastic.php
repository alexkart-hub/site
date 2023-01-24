<?php
namespace App\Services\Elastic;

use App\Models\Post;

class PostElastic extends ElasticService
{
    protected $post;

    public function setData(Post $post): PostElastic
    {
        $this->post = $post;
        return $this;
    }

    public function search($query = '')
    {
        $body = [
            'query' => [
                'match' => [
                    'detail_text' => $query
                ]
            ]
        ];
        $response = $this->client::post($this->getPath() . '_search', $body)->json();
        return $response['hits']['hits'] ?? [];
    }

    protected function getCrudPath($id = ''): string
    {
        return $this->getPath() . self::TYPE . ($this->post->id ?? $id);
    }
}
