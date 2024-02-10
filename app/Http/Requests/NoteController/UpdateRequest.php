<?php

namespace App\Http\Requests\NoteController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required',
            'swing' => 'required|integer|min:0',
            'running' => 'required|numeric|min:0',
            'practice' => 'nullable',
            'weight' => 'required|numeric|min:0',
            'condition' => 'required',
            'memo' => 'required|max:1000',
            'youtube_link' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です',
            'swing.required' => '素振り回数は必須です',
            'swing.integer' => '正しい数字を入力してください',
            'swing.min' => '正しい数字を入力してください',
            'running.required' => 'ランニング距離は必須です',
            'running.numeric' => '数字を入力してください',
            'running.min' => '正しい数字を入力してください',
            'weight.required' => '体重は必須です',
            'weight.numeric' => '数字を入力してください',
            'weight.min' => '正しい数字を入力してください',
            'condition.required' => '調子は必須です',
            'memo.required' => '今日の振り返りは必須です',
            'memo.max' => '今日の振り返りは1000文字以内で入力してください',
            'youtube_link.url' => '有効なURLを入力してください',
        ];
    }
}
