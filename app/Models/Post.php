<?php

namespace App\Models;

use Auth;
use App\User;
use App\Traits\HasLike;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasLike;

    protected $fillable = [
        'user_id', 'body',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function coments(){
        return $this->hasMany(Coment::class);
    }

    public function countComents(){
        return $this->coments()->count();
    }

}
