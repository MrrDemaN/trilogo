<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
             'name' => 'unique:App\Models\Article,name|required|min:2|max:30',
             'title' => 'required|min:50|max:70',
             'descriptoin' => 'required|min:2|max:70',
             'meta_name' => 'required|min:2|max:30',
             'meta_title' => 'required|min:50|max:70',
             'slug' => 'unique:App\Models\Category,slug|required|min:5|max:100',
             'content' => 'required'

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
