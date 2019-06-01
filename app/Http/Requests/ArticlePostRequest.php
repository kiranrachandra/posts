<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Posts;

class ArticlePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    { 
        $user = \Auth::user();
        if(\Auth::user()->isAdmin())
            return true;
        
        $post = Posts::findOrFail($this->route()->parameter('id'));  
 
        return $post->user_id === $user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
