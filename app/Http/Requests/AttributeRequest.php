<?php

namespace App\Http\Requests;

use App\Rules\AttributeUniqueName;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
//            'name'=>'required|unique:attributes_translations,name,'.$this->id_translation,
//            'name'=>'required|unique:attributes_translations,name,'.$this->id,
            'name'=>['required','max:100',new AttributeUniqueName($this->name,$this->id)]

        ];
    }
}
