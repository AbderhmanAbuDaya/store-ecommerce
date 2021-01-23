<?php

namespace App\Http\Requests;

use App\Rules\ProductQty;
use Illuminate\Foundation\Http\FormRequest;

class ProductStorHouseRequest extends FormRequest
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
            'sku'=>'nullable|min:5|max:10',
            'manage_stock'=>'required|in:0,1',
//            'qty'=>''.$this->isRequried(),
//            'qty'=>'required_if:manage_stock,==,1',
            'qty'=>[new ProductQty($this->manage_stock)],
            'in_stock'=>'required',
        ];
    }
//    public function isRequried(){
//        if(($this->manage_stock)==1){
//            return 'required';
//        }
//        return '';
//
//    }
}
