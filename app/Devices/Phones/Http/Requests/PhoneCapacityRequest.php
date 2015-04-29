<?php namespace ThreeAccents\Devices\Phones\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class PhoneCapacityRequest extends Request
{
    /*
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
    public function rules()
    {
        return [
            'capacity_slug' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}