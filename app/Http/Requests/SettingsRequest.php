<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'social_facebook' => 'max:20',
            'social_twitter' => 'max:20',
            'social_instagram' => 'max:20',
        ];
    }

    public function messages(){
        return [
            'social_facebook.max' => 'Social handle shouldnt be more than 20 ',
            'social_twitter.max' => 'Email shouldnt be more than 20 ',
            'social_instagram.max' => 'Phone number shouldnt be more than 20 ',
        ];
    }
}
