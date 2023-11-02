<?php

namespace App\Http\Requests;


class StoreRequestMobileNumberBulkRequest extends CustomFormRequest
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
            'file'=> 'required|file|mimes:csv|max:2048'
        ];
    }
}
