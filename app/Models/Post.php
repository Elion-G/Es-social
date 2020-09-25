<?php

namespace App\Models;

use Auth;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'body',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function coments(){
        return $this->hasMany(Coment::class);
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

    public function isComents()
    {
        return $this->coments()->get();
    }

    public function countComents(){
        return $this->coments()->count();
    }
}
