<?php

namespace App\Http\Requests;

use App\Http\Enumerations\CategoryType;
use App\Models\Category;
use App\Rules\SubOrMainCategory;
use Illuminate\Foundation\Http\FormRequest;

class MainCategotyRequest extends FormRequest
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
        'name'=>'required',
        //    'parentID'=>'required|in:1,2',
            'slug'=>'required|unique:categories,slug,'.$this->id,
           // 'name'=> 'required|unique:'
            'parent_id'=>[new SubOrMainCategory($this->parentId,$this->id)]


        ];
    }
}
