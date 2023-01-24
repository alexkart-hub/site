<?php
namespace App\Services\Elastic;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class ElasticService
{
    protected static $instance = null;
    protected $client;

    const ELASTIC_PATH = 'elasticsearch_maxis:9200/';
    const INDEX = 'post/';
    const TYPE = '_doc/';

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new static(new Http());
        }
        return self::$instance;
    }

    private function __construct(Http $client)
    {
        $this->client = $client;
    }

    public function ping(): bool
    {
        return $this->client::get(self::ELASTIC_PATH)->ok();
    }

    public function post(array $query = []): Response
    {
        return $this->client::post($this->getCrudPath(), $query);
    }

    public function update(array $query = []): Response
    {
        return $this->client::put($this->getCrudPath(), $query);
    }

    public function delete($id): Response
    {
        return $this->client::delete($this->getCrudPath($id));
    }

    protected function getPath()
    {
        return self::ELASTIC_PATH . static::INDEX;
    }
}
