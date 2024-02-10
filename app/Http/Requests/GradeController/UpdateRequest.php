<?php

namespace App\Http\Requests\GradeController;

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
            'date' => 'required|date',
            'place' => 'required',
            'opponent' => 'required',
            'OwnScore' => 'required|integer|min:0',
            'OtherScore' => 'required|integer|min:0',
            'rbi' => 'integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付は必須です',
            'date.date' => '有効な日付を入力してください',
            'place.required' => '場所は必須です',
            'opponent.required' => '対戦相手は必須です',
            'OwnScore.required' => '自チームスコアは必須',
            'OwnScore.integer' => '有効な数字を入力してください',
            'OwnScore.min:0' => '有効な数字を入力してください',
            'OtherScore.required' => '相手チームスコアは必須です',
            'OtherScore.integer' => '有効な数字を入力してください',
            'OtherScore.min:0' => '有効な数字を入力してください',
            'rbi.integer' => '有効な数字を入力してください',
            'rbi.min:0' => '有効な数字を入力してください',
        ];
    }
}
