<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogues';
    protected $fillable = [
        'name','alias','parent_id'
    ];
    public $timestamps = false;
    public function new(){
        return $this->hasMany('App\News');
    }
}
