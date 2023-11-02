<?php

namespace App\Http\Requests;


class UpdateRequestCardActivationRequest extends CustomFormRequest
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
            'id'=>'required|integer',
            'bin' => 'required|string',
            'branch' => 'required|string',
            'card_number' => 'required|string',
        ];
    }
}
