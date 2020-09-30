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
            'categories.*'=>'numeric|exist:categories,id,',
            'tags'=>'array|min:1',
            'tags.*'=>'numeric|exist:tags,id',
            'brand_id'=>'required|exist:brands,id'
        ];
    }
    public function messages()
    {
        $messages = array();

            $messages['categories.required'] = 'the categories must required';
            $messages['categories.*.exist:categories,id'] = 'the categories must exist in categories';
            $messages['categories.*.numeric'] = 'the categories must exist in categories';


//        foreach($this->tags as $key => $valor) {
//            $messages['tags.'.$key] =  $valor;
//
//        }

        return $messages;
    }
}
