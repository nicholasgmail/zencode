<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentators extends Model
{
    use HasFactory;

    protected $fillable = ["name", "mail", "avatar"];

    //опции
    public function options()
    {
        return $this->morphedByMany(Options::class, 'commentgable');
    }
}
