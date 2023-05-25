<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerValidation extends FormRequest
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
             'fName'=>'required',
             'lName'=>'required',
             'contactNumber2'=>'required',

        ];
    }
    public function messages()
    {
       return[
           'fName.required'=>'First Name should be provided!',
           'lName.required'=>'Last Name should be provided!',
           'contactNumber2.required'=>'Mobile Number should be provided!',
       ];
    }
}
