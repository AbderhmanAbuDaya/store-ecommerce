<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class SubOrMainCategory implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $parentID,$thisId;
    public function __construct($parentID,$thisId)
    {
        $this->parentID=$parentID;
        $this->thisId=$thisId;
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
        if($this->parentID==1||$this->parentID==null) {
            return true;
        }else{
            $subCategory=Category::Sub()->find($value)->first();
            if(is_null($subCategory))
                return false;

            return true;

        }
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
