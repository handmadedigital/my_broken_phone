<?php namespace ThreeAccents\Devices\Phones\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class PhoneCarrierRequest extends Request
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
            'carrier_slug' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'carrier_slug.required' => 'Please select a carrier'
        ];
    }
}