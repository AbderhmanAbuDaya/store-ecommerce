<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];//هاي للترجمة بحط الكولم الي بدو يترجم
    protected $fillable = ['parent_id', 'slug', 'is_active'];
    protected $hidden = ['translations'];
    protected $casts = [
        'is_active' => 'boolean' // هان بتعمل بتخل رجعلك true or false
    ];
    public $timestamps = true;

}
