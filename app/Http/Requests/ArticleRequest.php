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
      // 'name',
      // 'title',
      // 'descriptoin',
      // 'meta_name',
      // 'meta_heads',
      // 'slug',
      // 'content',
      // //
        return [
             'name' => 'unique:App\Models\Article,name|required|min:5|max:100',
             'title' => 'required|min:5|max:100',
             'descriptoin' => 'required',
             'meta_name' => 'required|min:5|max:255',
             'meta_heads' => 'required|min:5|max:255',
             'slug' => 'required|min:5|max:255',
             'content' => 'required|min:5|max:255'

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
