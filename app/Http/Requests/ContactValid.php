<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactValid extends FormRequest
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
          'Name' =>'required|min:3|max:50',
          'Email' =>'required|email',
          'Message' =>'required',
           // 'g-recaptcha-response' => 'required|captcha'
        ];
    }
    public function messages()
    {
        return [
          'Name.required' => 'Please Enter Your Name',
          'Email.required' => 'Please Enter Your Email',
          'Message.required' => 'Please Enter Your Message',
          'Name.min' => 'Please Enter minimum 3 Char ',
          'Email.email' => 'Invalid Email Address!',

          'Name.max' => 'Please Enter maximum 50 Char ',
        ];
    }
}
