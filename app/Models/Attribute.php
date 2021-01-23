<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;

    protected $with=['translations'];
    protected $translatedAttributes=['name'];//هاي للترجمة بحط الكولم الي بدو يترجم
    protected $fillable=['id','is_active'];
    protected $casts=[
        'is_active'=>'boolean' // هان بتعمل بتخل رجعلك true or false
    ];
    public function getIsActiveAttribute($val){
        return $val==1?'active':'not active';
    }
    public function options(){
        return $this->hasMany('App\Models\Option','attribute_id','id');
    }



}
