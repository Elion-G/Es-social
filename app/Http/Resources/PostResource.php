<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Http\Resources\UserResource;
use App\Http\Resources\ComentResource;
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
            'user' => UserResource::make($this->user),
            'created_at' => $this->created_at->diffForHumans(),
            'images' => $this->images,
            'liked' => $this->isLiked(),
            'countLike' => $this->countLike(),
            'coments' => ComentResource::collection($this->coments),
            'countComents' => $this->countComents(),
        ];
    }
}
