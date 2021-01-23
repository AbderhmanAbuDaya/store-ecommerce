<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPriceRequest extends FormRequest
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
        'id_product'=>'required|exists:products,id',
            'price'=>'required',
        'special_price'=>'nullable|numeric',
        'special_price_type'=>'required_with:special_price|',
        'special_price_start'=>'required_with:special_price|',
        'special_price_end'=>'required_with:special_price|'.$this->isRequried(),

        ];
    }

    public function isRequried(){
        if(!is_null($this->special_price)){
            return 'after_or_equal:special_price_start';
       }
        return '';

    }
}
