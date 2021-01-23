<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use Translatable;

    protected $with=['translations'];
    protected $translatedAttributes=['name'];//هاي للترجمة بحط الكولم الي بدو يترجم
    protected $fillable=['id','attribute_id','product_id','price'];

    public function product(){
        return $this->belongsTo('App\Models\product','product_id','id');
    }
    public function attribute(){
        return $this->belongsTo('App\Models\Attribute','attribute_id','id');
    }
}
