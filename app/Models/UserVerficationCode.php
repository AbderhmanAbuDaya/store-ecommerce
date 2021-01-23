<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class UserVerficationCode extends Model
{
    public $table='users_verficationCode';

    protected $fillable=['id','user_id','code'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

}
