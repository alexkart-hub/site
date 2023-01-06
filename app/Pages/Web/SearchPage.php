<?php

namespace App\Pages\Web;

use App\Pages\Page;
use App\Services\Elastic\PostElastic;
use Illuminate\Http\Request;

class SearchPage extends Page
{
    protected $query;

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }


    public function setResult()
    {
        $this->data['result'] = PostElastic::instance()->search($this->query);
        return $this;
    }
}
