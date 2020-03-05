<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'connection', 'queue', 'payload','sort'
    ];
    public function news_imgs()
    {
        return $this->hasMany('App\NewsImgs');
    }
}



