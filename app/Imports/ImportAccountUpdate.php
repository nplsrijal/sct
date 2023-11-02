<?php

namespace App\Imports;

use App\Models\Account_update;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;


class ImportAccountUpdate implements ToModel
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
            'old_account'=>$row[1],
            'new_account'=>$row[2],
            'new_customer_code'=>$row[3],
            'customer_name'=>$row[4],
            'contact_number'=>$row[5],
            'bin'=>$this->request->input('bin'),
            'branch'=>$this->request->input('branch'),
            'isbulk'=>'Y',
            'submitted_by'=>$userinfo->id,
            'submitted_date'=>$curr_date,
            'created_by'=>$userinfo->id,
            'created_at'=>$curr_date
        ];

        if(!empty($this->request->input('isactivate'))  && $this->request->input('isactivate')=='on')
        {
            $data['isactivate']='Y';
        }
        if(!empty($this->request->input('isupdatedetails'))  && $this->request->input('isupdatedetails')=='on')
        {
            $data['isupdatedetails']='Y';
        }
        return new Account_update($data);
    }
}
