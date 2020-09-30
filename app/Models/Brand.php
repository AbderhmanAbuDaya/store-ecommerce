<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $with=['translations'];
    protected $translatedAttributes=['name'];//هاي للترجمة بحط الكولم الي بدو يترجم
    protected $fillable=['id','is_active','photo'];
    protected $casts=[
        'is_active'=>'boolean' // هان بتعمل بتخل رجعلك true or false
    ];
    public function getIsActiveAttribute($val){
        return $val==1?'active':'not active';
    }
    public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id');
    }
    public function scopeActive($query){
        return $query->where('is_active',1);
    }


}
