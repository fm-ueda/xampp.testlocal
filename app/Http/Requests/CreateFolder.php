<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// バリデーションをつかさどるFormRequestクラスを作成
class CreateFolder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // 認証関係の処理を行うメソッドなので、特にない場合は常にtrueを返しておく
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    /**
     * 入力欄ごとにチェックするルールを定義し、ruleメソッドが返す配列がルールを表す
     * 配列のキーが入力欄になり、HTML側のinput要素のname属性に対応する
     * titleに、必須入力を表すrequiredを指定している
     */
    public function rules()
    {
        return [
            /**
             * titleカラム定義のVARCHAR(20)に合わせて、上限文字数ルールを追加する 
             * max:20が入力上限数値を表し、複数のルールは | で区切る
             */
            'title' => 'required|max:20',
        ];
    }

    // 入力欄の名称をカスタマイズするためattributesメソッドを追加
    public function attributes()
    {
        // 入力欄の名称を定義する
        return [
            'title' => 'フォルダ名',
        ];
    }
}
