<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $primaryKey = 'genres_id';

    protected $fillable = ['genre'];

    public function shop () {
        return $this->hasOne('App\Shop');
    }
}
