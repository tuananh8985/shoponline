<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name','alias','price','color','warranty','parameter','description','offer','user_id','cate_id','image'
    ];
    public function cate(){
        return $this->belongTo('App\Cate');
    }
    public function user(){
        return $this->belongTo('App\User');
    }
    public function pimages(){
        return $this->hasMany('App\ProductImages');
    }
}
