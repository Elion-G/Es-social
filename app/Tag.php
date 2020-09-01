<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //morphedByMany= este sería el método correspondiente para hacer
    // ver muchos a muchos desde la tabla principal y esta entidad será siempre la madre
    //o decir que una etiqueta tiene muchos posts
    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos(){
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
