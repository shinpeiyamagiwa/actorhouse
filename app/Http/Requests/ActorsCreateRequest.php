<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // 認証関係の処理を行う時にかきこむが、特になく常にtrueを返しておく
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
            //
            'name'=> 'required',//name欄は必須というルールが追加された
            
        ];
    }
}
