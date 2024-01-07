<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Mobile_update;
use App\Http\Requests\UpdateStatusSingleRequest;

use DataTables;

class SubmitMobileNumberController extends BaseController
{
    //
    public function __construct(){

        $this->folder='admin.submit-mobilenumber';
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
            ->where('mobile_updates.status','P')->where('isbulk','N')->orderBy('mobile_updates.id', 'asc')
            ->get(['mobile_updates.*','users.fname','users.lname']);
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
     
                     $btn='';
                     
                        $btn .= "<a href='javascript:void(0)' class='edit btn btn-success btn-sm approveData' data-pid='".$row->id."' ><i class='fas fa-check'></i> Submit</a>";
                        $btn .= "&nbsp;<a href='javascript:void(0)' class='edit btn btn-danger btn-sm rejectData' data-pid='".$row->id."'><i class='fas fa-multiply'></i> Cancel</a>";

                     
                     
       
                    return $btn;
                    })
                    ->addColumn('created_by_name', function($row) {
                        return $row->fname.' '.$row->lname;
                    })
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Submit Mobile Number ';
         $form_title='';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder'));
    }

    public function update(UpdateStatusSingleRequest $request, $id)
    {
        $validatedData =$request->validated();

        $mobilenumber_data=Mobile_update::find($id);

        $userinfo=getUserDetail();
        if($validatedData['status']=='S')
        {
            $validatedData['submitted_by']=$userinfo->id;
            $validatedData['submitted_date']=date('Y-m-d H:i:s');
        }
        $validatedData['updated_by']=$userinfo->id;
        $validatedData['updated_at']=date('Y-m-d H:i:s');


         $data_save=$mobilenumber_data->update($validatedData);
       
        if($data_save)
        {
            return $this->sendResponse(true,getMessageText('update'));

        }
        else
        {
           return $this->sendError(getMessageText('update',false));

        }
       
    }

    public function getSubmittedList(Request $request)
    {
        if ($request->ajax())
        {
            $data = Mobile_update::join('users', 'mobile_updates.created_by', '=', 'users.id')
            ->where('mobile_updates.status','S')->orderBy('id', 'asc')
            ->get(['mobile_updates.*','users.fname','users.lname']);


            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
     
                     $btn='';
                     
       
                    return $btn;
                    })
                    ->addColumn('created_by_name', function($row) {
                        return $row->fname.' '.$row->lname;
                    })
            ->rawColumns(['action'])
            ->make(true);
        }
        $title='Submitted Mobile Number List';
        $form_title='';
        $folder=$this->folder;
       return view($this->folder.'.list',compact('title','form_title','folder'));
    }

    public function getCompletedList(Request $request)
    {
        if ($request->ajax())
        {
            $data = Mobile_update::join('users', 'mobile_updates.created_by', '=', 'users.id')
            ->where('mobile_updates.status','S')->orderBy('id', 'asc')
            ->get(['mobile_updates.*','users.fname','users.lname']);
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
     
                     $btn='';
                     
       
                    return $btn;
                    })
                    ->addColumn('created_by_name', function($row) {
                        return $row->fname.' '.$row->lname;
                    })
            ->rawColumns(['action'])
            ->make(true);
        }
        $title='Done Mobile Number List';
        $form_title='';
        $folder=$this->folder;
       return view($this->folder.'.list',compact('title','form_title','folder'));

    }
    



    

}
