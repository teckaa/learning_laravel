<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|min:5|max:50',
            'phonenumber' => 'required|min:5|max:20',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Customer name is required',
            'email.required' => 'Customer email is required',
            'phonenumber.required' => 'Customer phone number is required',

            'email.email' => 'Enter valid email',

            'email.unique' => 'You already have a customer with same email ',
            'phonenumber.unique' => 'Phone number shouldnt be more than 20 ',

            'name.min' => 'Name shouldnt be less than 2 ',
            'email.min' => 'Email shouldnt be less than 5 ',
            'phonenumber.min' => 'Phone number shouldnt be less than 5 ',

            'name.max' => 'Name shouldnt be more than 50 ',
            'email.max' => 'Email shouldnt be more than 50 ',
            'phonenumber.max' => 'Phone number shouldnt be more than 20 ',
        ];
    }
}
