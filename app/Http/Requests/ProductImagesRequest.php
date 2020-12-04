<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImagesRequest extends FormRequest
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

        $this->redirect="admin/dashboard/products/general-information/3";
        return [
            'id_product'=>'required|exists:products,id',
            'document'=>'required|array|min:1',
            'document.*'=>'required|string',

        ];
    }
}
