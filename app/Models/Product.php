<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,softDeletes;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name','description','short_description'];
    protected $fillable=[
        'id',
        'brand_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    protected $casts=[
        'manage_stock'=>'boolen',
        'in_stock'=>'boolen',
        'is_active'=>'boolen',
    ];

    protected $dates=[
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at'
    ];

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id','id')->withDefault();
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag','products_tags','product_id','tag_id','id','id');
    }
    public function categories(){
        return $this->belongsToMany('App\Models\Category','categories_products','product_id','category_id','id','id');
    }

}
