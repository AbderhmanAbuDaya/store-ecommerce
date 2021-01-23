<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'email'=>'required|email|unique:admins,email,'.$this->id,
            //هاي معناتها الايميل يكون يونيك ف جدول الادمن  عمود الايميل ماعدا اي ديه ده عشان اذا ضفت نفس الايميل ل نفس اليوزر يقبلو
           'password'=>'nullable|confirmed|max:8|min:4|same:new_password'

        ];
    }
    public function messages()
    {
        return [
            'name.required'=> __('admin/messages.profile value'),
            'email.required'=>__('admin/profile.email required'),

        ];
    }
}
