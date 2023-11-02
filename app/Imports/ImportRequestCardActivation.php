<?php

namespace App\Imports;

use App\Models\Green_pin_activate;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;


class ImportRequestCardActivation implements ToModel
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
        return new Green_pin_activate([
            'card_number'=>$row[0],
            'bin'=>$this->request->input('bin'),
            'branch'=>$this->request->input('branch'),
            'isbulk'=>'Y',
            'submitted_by'=>$userinfo->id,
            'submitted_date'=>$curr_date,
            'created_by'=>$userinfo->id,
            'created_at'=>$curr_date
        ]);
    }
}
