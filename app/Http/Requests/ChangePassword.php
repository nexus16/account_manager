<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            'password-current' => 'required',
            'password-new' => 'required|min:6|max:32',
            'password-confirm' => 'required|same:password-new',
        ];
    }
    public function messages()
    {
        return [
            'password-current.required' => '現在のパスワードを入力してください。',
            'password-new.required' => '新しいパスワードを入力してください。',
            'password-new.min' => '6文字以上で入力してください。',
            'password-new.max' => '32文字以下で入力してください。',
            'password-confirm.required' => '新しいパスワード(確認)を入力してください。）',
            'password-confirm.same' => '新しいパスワード(確認)と新しいパスワードは同じでなければなりません。'
        ];
    }
}
