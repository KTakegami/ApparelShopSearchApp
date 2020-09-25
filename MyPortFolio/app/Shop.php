<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $primaryKey = 'shops_id';

    protected $fillable = ['name', 'description', 'shop_image'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
