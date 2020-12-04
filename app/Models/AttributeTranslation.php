<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    protected $table='attributes_translations';
    protected $fillable=['name','attribute_id'];
    public $timeStamps=true;


}
