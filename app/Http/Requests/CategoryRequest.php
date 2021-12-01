<?php

namespace App\Http\Requests;

use App\Rules\Boris;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|min:5|max:20',
            'slug' => ['required', 'min:3', New Boris()],
           // 'slug' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
           'title.required' => 'Название категории заполнить вам необходимо',
            'title.min' => 'Буков в поле надобно боле',
        ];

    }

    public function attributeNames()
    {
        return [
            'title' => 'Заголовок категории',
            'slug' => 'slug категории',
        ];
    }
}
