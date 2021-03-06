<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            
            'content' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [
            'content.required'=>'内容を記載してください',
            'content.max:300' => '内容は300文字以内で記入してください。',
        ];
    }
}
