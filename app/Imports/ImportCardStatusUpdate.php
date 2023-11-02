<?php

namespace App\Imports;

use App\Models\Card_status_update;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;


class ImportCardStatusUpdate implements ToModel
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $userinfo=getUserDetail();
        $curr_date=date('Y-m-d H:i:s');
        $data=[
            'card_number'=>$row[0],
            'bin'=>$this->request->input('bin'),
            'request_type'=>$this->request->input('request_type'),
            'isbulk'=>'Y',
            'submitted_by'=>$userinfo->id,
            'submitted_date'=>$curr_date,
            'created_by'=>$userinfo->id,
            'created_at'=>$curr_date
        ];

        return new Card_status_update($data);
    }
}
