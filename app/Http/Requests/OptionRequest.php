<?php

namespace App\Http\Requests;

use App\Rules\OptionUniqueName;
use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'product_id'=>  'required|numeric|exists:products,id',
            'attribute_id'=>'required|numeric|exists:attributes,id',
            'name'=>['required','max:100',new OptionUniqueName($this->name,$this->id)],
            'price'=>'required|numeric'
        ];
    }
}
