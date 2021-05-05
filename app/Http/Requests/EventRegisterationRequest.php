<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRegisterationRequest extends FormRequest
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
            'applicant_fname' => 'required',
            'applicant_lname' => 'required',
            'applicant_email' => 'required',
            'applicant_phone' => 'required',
            'applicant_address' => 'required'
        ];
    }
}
