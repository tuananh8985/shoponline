<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewImages extends Model
{
    protected $table = 'new_images';
    protected $fillable = [
        'news_id','image'
    ];
    public $timestamps = false;
    public function new(){
        return $this->belongTo('App\News');
    }
}
