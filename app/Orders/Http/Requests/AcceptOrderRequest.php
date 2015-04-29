<?php namespace ThreeAccents\Orders\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class AcceptOrderRequest extends Request
{
    /*
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'order_id' => 'required',
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