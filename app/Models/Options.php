<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    use HasFactory;

    protected $fillable = ["text", "like", "hash_tag"];

    /**
     * option
     */
    public function commentator()
    {
        return $this->morphToMany(Commentators::class, 'commentgable')->withPivot('geolocation_ip', 'all_comment');
    }

    //ссылки
    public function url()
    {
        return $this->morphOne(Urls::class, 'urltable');
    }

    /**
     * TODO удалить
     * даные по коментатору
     */
    /* public function commentinfo()
     {
         return $this->belongsToMany(Commentators::class, 'commentgable')->withPivot('geolocation_ip', 'coment_all');
     }*/
}
