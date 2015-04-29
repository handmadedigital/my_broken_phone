<?php namespace ThreeAccents\Auth\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class RegisterRequest extends Request
{
    /*
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
    public function rules()
    {
        return [
            'username' => 'required|unique:users',
            'full_name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required',
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