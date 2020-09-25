<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table = 'prefectures';

    protected $primaryKey = 'prefectures_id';

    protected $fillable = ['prefectures'];

    public function shop() {
        return $this->hasOne('App\Shop');
    }
}
