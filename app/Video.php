<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
//belongsTo= pertenece a
    public function category(){
        return $this->belongsTo(Category::class);
    }
//morphMany= tiene muchos comentarios 
//pero es polimorfico y el método polimorfico es "comentable"
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
//morphMany= tiene una imagen
//pero es polimorfico y el método polimorfico es "imageable"
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
