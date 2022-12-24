<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public static $wrap = 'post';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $post = parent::toArray($request);
        $post['created_at'] = $this->created_at->format('d-m-Y H:i:s');
        $post['updated_at'] = $this->updated_at->format('d-m-Y H:i:s');
        return $post;
    }
}
