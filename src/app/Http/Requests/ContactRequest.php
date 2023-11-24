<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'family-name' => ['required'],
            'given-name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'postcode' => ['required', 'regex:/^[0-9A-Za-z-]{8}$/'],
            'address' => ['required'],
            'opinion' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'family-name.required' => 'お名前（姓）は必須項目です',
            'given-name.required' => 'お名前（名）は必須項目です',
            'gender.required' => '性別は必須項目です',
            'email.required' => 'メールアドレスは必須項目です',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'postcode.required' => '郵便番号は必須項目です',
            'postcode.regex' => 'ハイフンありの半角で8文字の郵便番号を入力してください',
            'address.required' => '住所は必須項目です',
            'opinion.required' => 'ご意見は必須項目です',
            'opinion.max:120' => 'ご意見は120文字以内で入力してください',
        ];
    }
}
