<?php

namespace App\Rules;

use App\Models\Attribute;
use App\Models\AttributeTranslation;
use Illuminate\Contracts\Validation\Rule;

class AttributeUniqueName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
   private $attributeName;
   private $attributeId;
    public function __construct($attributeName,$attributeId)
    {
        $this->attributeName=$attributeName;
        $this->attributeId=$attributeId;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->attributeId)
        $attributeT=AttributeTranslation::where([['name',$this->attributeName],['attribute_id','!=',$this->attributeId]])->first();
          else
        $attributeT=AttributeTranslation::where([['name',$this->attributeName]])->first();


        if(is_null($attributeT))
            return true;

   return false;


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
