<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'body' => $this->body,
            'user_name' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans(),
            'images' => $this->images,
            'liked' => $this->isLiked(),
            'countLike' => $this->countLike(),
            'coments' => $this->isComents(),
            'countComents' => $this->countComents(),
        ];
    }
}
