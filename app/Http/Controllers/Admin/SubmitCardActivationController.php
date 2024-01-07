<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Green_pin_activate;
use App\Http\Requests\UpdateStatusSingleRequest;

use DataTables;

class SubmitCardActivationController extends BaseController
{
    //
    public function __construct(){

        $this->folder='admin.submit-card-activation';
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data =  Green_pin_activate::join('users', 'green_pin_activates.created_by', '=', 'users.id')
            ->where('status','P')
            ->where('isbulk','N')->orderBy('id', 'asc')
            ->get(['green_pin_activates.*','users.fname','users.lname']);

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

        $card_data=Green_pin_activate::find($id);

        $userinfo=getUserDetail();
        if($validatedData['status']=='S')
        {
            $validatedData['submitted_by']=$userinfo->id;
            $validatedData['submitted_date']=date('Y-m-d H:i:s');
        }
        $validatedData['updated_by']=$userinfo->id;
        $validatedData['updated_at']=date('Y-m-d H:i:s');


         $data_save=$card_data->update($validatedData);
       
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
            $data =  Green_pin_activate::join('users', 'green_pin_activates.created_by', '=', 'users.id')
            ->where('status','S')
            ->get(['green_pin_activates.*','users.fname','users.lname']);
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
        $title='Submitted Card Activation & Green Pin List';
        $form_title='';
        $folder=$this->folder;
       return view($this->folder.'.list',compact('title','form_title','folder'));
    }

    public function getCompletedList(Request $request)
    {
        if ($request->ajax())
        {
            $data =  Green_pin_activate::join('users', 'green_pin_activates.created_by', '=', 'users.id')
            ->where('status','S')
            ->get(['green_pin_activates.*','users.fname','users.lname']);
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
        $title='Done Card Activation & Green Pin List';
        $form_title='';
        $folder=$this->folder;
       return view($this->folder.'.list',compact('title','form_title','folder'));

    }
    
}
