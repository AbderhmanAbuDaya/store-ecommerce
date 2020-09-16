<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    protected $table='brands_translations';
    protected $fillable=['name'];
    public $timeStamps=true;
}
