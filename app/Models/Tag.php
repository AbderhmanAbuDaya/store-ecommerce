<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable=['slug'];
    protected $hidden=['created_at','updated_at','translations'];
    public function products(){
        return $this->belongsToMany('App\Models\Product','products_tags','tag_id','product_id','id','id');
    }
    public function scopeActive($query){
        return $query->where('is_active',1);
    }
}
