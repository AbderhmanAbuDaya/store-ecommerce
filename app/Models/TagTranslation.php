<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $fillable=['locale','name','tage_id'];
    protected $hidden=['created_at','updated_at'];
}
