<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'name','alias','description','content','image','user_id','cate_id'
    ];
    public function cate(){
        return $this->belongTo('App\Catalogue');
    }
    public function user(){
        return $this->belongTo('App\User');
    }
    public function nimages(){
        return $this->hasMany('App\NewImages');
    }
}
