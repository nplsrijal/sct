<?php

namespace App\Http\Requests;


class StoreAccountUpdateRequest extends CustomFormRequest
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
            'bin' => 'required|string',
            'branch' => 'required|string',
            'card_number' => 'required|string',
            'customer_name' => 'required|string',
            'new_account' => 'required|string',
            'new_customer_code' => 'required|string',
            'isactivate' => 'required|sometimes',
            'isupdatedetails' => 'required|sometimes',
            'old_account' => 'required|sometimes',
            'contact_number' => 'required|sometimes',
        ];
    }
}
