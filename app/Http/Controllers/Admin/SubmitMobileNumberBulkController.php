<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Mobile_update;
use App\Http\Requests\UpdateStatusBulkRequest;

use DataTables;

class SubmitMobileNumberBulkController extends BaseController
{
     //
     public function __construct(){

        $this->folder='admin.submit-mobilenumber-bulk';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Mobile_update::join('users', 'mobile_updates.created_by', '=', 'users.id')
            ->where('status','P')->where('isbulk','Y')->orderBy('id', 'asc')
            ->get(['mobile_updates.*','users.fname','users.lname']);

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
     
                        $btn = "<input type='checkbox' name='check_data[]' value='".$row->id."'>";

                     
                     
       
                    return $btn;
                    })
                    ->addColumn('created_by_name', function($row) {
                        return $row->fname.' '.$row->lname;
                    })
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Submit Mobile Number In Bulk ';
         $form_title='';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder'));
    }

    public function updateStatus(UpdateStatusBulkRequest $request)
    {
        $validatedData =$request->validated();

        $condition=array_values($validatedData['ids']);

        unset($validatedData['ids']);

        $userinfo=getUserDetail();
        if($validatedData['status']=='S')
        {
            $validatedData['submitted_by']=$userinfo->id;
            $validatedData['submitted_date']=date('Y-m-d H:i:s');
        }
        $validatedData['updated_by']=$userinfo->id;
        $validatedData['updated_at']=date('Y-m-d H:i:s');


         $data_save=Mobile_update::whereIn('id',$condition)->update($validatedData);
       
        if($data_save)
        {
            return $this->sendResponse(true,getMessageText('update'));

        }
        else
        {
           return $this->sendError(getMessageText('update',false));

        }
       
    }
}
