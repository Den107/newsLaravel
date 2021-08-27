<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'category_id' => ['required', 'numeric', 'min:5', 'max:191'],
            'author' => ['required', 'string', 'min:2', 'max:80'],
            'description' => ['sometimes'],
            'status' => ['sometimes']

        ];
    }

    public function messages()
    {
        return parent::messages();
    }

    public function attributes()
    {
        return parent::attributes();
    }
}
