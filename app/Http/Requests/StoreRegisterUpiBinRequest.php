<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterUpiBinRequest extends FormRequest
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
            'aggregator' => 'required|string',
            'type' => 'required|string|max:50',
            'route_bin' => 'required|string|max:50',
            'bin' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'assigned_date' => 'required|date',
            'bankid' => 'required|integer',
            'bankcode' => 'required|string',
            'card_program' => 'required|string',
            'account_program' => 'required|string',
            'cbs_name' => 'required|string',
            'binary_name' => 'required|string',
            'card_type' => 'required|string',
            'status' => 'sometimes|string|max:1', // 'sometimes' allows the field to be nullable
        ];
    }
}
