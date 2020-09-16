<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];//هاي للترجمة بحط الكولم الي بدو يترجم
    protected $fillable = ['parent_id', 'slug', 'is_active','id'];
    protected $hidden = ['translations'];
    protected $casts = [
        'is_active' => 'boolean' // هان بتعمل بتخل رجعلك true or false
    ];
    public $timestamps = true;

    public function  scopeParent($query){
        return $query->whereNull(['parent_id']);
    }
    public function  scopeSub($query){
        return $query->whereNotNull(['parent_id']);
    }
    public function  mainCategory(){
        return $this->belongsTo(self::class,'parent_id','id');
    }

    public function getIsActiveAttribute($val){
        return $val==1?'active':'not active';
    }

}
