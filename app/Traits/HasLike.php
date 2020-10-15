<?php

namespace App\Traits;

use App\Models\Like;

trait HasLike
{
    public function likes(){
        return $this->morphMany(Like::class, 'likeable');
    }

    public function like()
    {
        $this->likes()->firstOrCreate([
            'user_id' => auth()->id()
        ]);
    }

    public function unliked()
    {
        $this->likes()->where([
            'user_id' => auth()->id()
        ])->delete();
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function countLike(){
        return $this->likes()->count();
    }

}
