<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// バリデーションをつかさどるFormRequestクラスを作成
class CreateTask extends FormRequest
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
     * titleとdue_dateに、必須入力を表すrequiredを指定している
     * さらにdue_dateにafter_or_equalを使用し、引数にtodayを指定することで今日を含んだ未来日だけを許容する
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today',
        ];
    }

    // 入力欄の名称をカスタマイズするためattributesメソッドを追加
    public function attributes()
    {
        // 入力欄の名称を定義する
        return [
            'title' => 'タイトル',
            'due_date' => '期限日',
        ];
    }

    /**
     * due_dateのafter_or_equalルールに違反した場合のメッセージを出力するためのメソッド
     * FormRequestクラス内部でのみ有効なメッセージを定義する
     */
    public function messages()
    {
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
