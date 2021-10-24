<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemInformationRequest extends FormRequest
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
            'item_name' =>['required', 'max:255'],
            'comment' =>['required', 'max:1000'],
            'category_id' =>['required', 'exists:categories,id'],
            'price' => ['required', 'integer', 'min:0'],
        ];
    }
}
