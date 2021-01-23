<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
class Setting extends Model
{
    use Translatable;

    protected $with=['translations'];
    protected $translatedAttributes=['value','locale'];//هاي للترجمة بحط الكولم الي بدو يترجم
    protected $fillable=['key','is_translatable','plain_value'];
    protected $casts=[
        'is_translatable'=>'boolean' // هان بتعمل بتخل رجعلك true or false
    ];

    public static function setMany($settings)
    {
        foreach ($settings as $key => $value) {
            self::set($key, $value);
        }
    }

    public static function set($key, $value)
    {
        if ($key === 'translatable') {
            return static::setTranslatableSettings($value);
        }

        if(is_array($value))
        {
            $value = json_encode($value);//بحول اي اشي لنص يعني الاري بتصير نص
        }

        static::updateOrCreate(['key' => $key], ['plain_value' => $value]);
    }

    public static function setTranslatableSettings($settings = [])
    {
        foreach ($settings as $key => $value) {
            static::updateOrCreate(['key' => $key], [
                'is_translatable' => true,
                'value' => $value,
                
            ]);
        }
    }


}
