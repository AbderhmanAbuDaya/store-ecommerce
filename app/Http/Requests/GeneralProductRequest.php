<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralProductRequest extends FormRequest
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
            'name'=>'required|max:100',
       'slug'=>'required|max:200|unique:products,slug,'.$this->id,
      'description'=>'required|max:10000',
            'short_description'=>'nullable|max:300',
            'categories'=>'array|min:1',
            'categories.*'=>'numeric|exists:categories,id',
            'tags'=>'array|min:1',
            'tags.*'=>'numeric|exists:tags,id',
            'brand_id'=>'required|exists:brands,id',
        ];
    }

}
