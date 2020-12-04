<?php

namespace App\Rules;

use App\Models\OptionTranslation;
use Illuminate\Contracts\Validation\Rule;

class OptionUniqueName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $optionName;
    private $optionId;
    public function __construct($optionName,$optionId)
    {
        $this->optionName=$optionName;
        $this->optionId=$optionId;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($option, $value)
    {
        if ($this->optionId)
            $optionT=OptionTranslation::where([['name',$this->optionName],['option_id','!=',$this->optionId]])->first();
        else
            $optionT=OptionTranslation::where([['name',$this->optionName]])->first();


        if(is_null($optionT))
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
