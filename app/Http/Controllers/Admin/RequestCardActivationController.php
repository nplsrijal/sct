<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Green_pin_activate;
use App\Http\Requests\StoreRequestCardActivationRequest;
use App\Http\Requests\UpdateRequestCardActivationRequest;

use DataTables;

class RequestCardActivationController extends BaseController
{
    public function __construct(){

        $this->folder='admin.request-card-activation';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check button access
        $access=checkAccessPrivileges('request-card-activation');
        if ($request->ajax()) {
            $data = Green_pin_activate::select('*')->where('isbulk','N')->orderBy('id', 'asc');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) use($access){
     
                     $btn='';
                     if($access['isedit']=='Y' && $row->status =='P')
                     {
                        $btn .= "<a href='javascript:void(0)' class='edit btn btn-primary btn-sm editData' data-pid='".$row->id."' data-url=".route('request-card-activation.show',"$row->id")."><i class='fas fa-edit'></i> Edit</a>";

                     }
                     if($access['isdelete']=='Y' && $row->status =='P')
                     {
                        $btn .= "&nbsp;<a href='javascript:void(0)' class='edit btn btn-danger btn-sm deleteData' data-pid='".$row->id."' data-url=".route('request-card-activation.destroy',"$row->id")."><i class='fas fa-trash'></i> Delete</a>";

                     }
       
                    return $btn;
                    })
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Requested Card Activation & Green Pin List';
         $form_title='Request Card Activation & Green Pin';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder','access'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestCardActivationRequest $request)
    {

        
            $savedata =$request->validated();

            $userinfo=getUserDetail();
            $savedata['submitted_by']=$userinfo->id;
            $savedata['created_by']=$userinfo->id;
            $savedata['submitted_date']=date('Y-m-d H:i:s');
            $savedata['created_at']=$savedata['submitted_date'];

            $data_save=Green_pin_activate::create($savedata);
        
            if($data_save)
            {
                return $this->sendResponse(true,getMessageText('insert'));

            }
            else
            {
            return $this->sendError(getMessageText('insert',false));

            }

        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $green_pin_activate=Green_pin_activate::find($id);
        if($green_pin_activate)
        {
          return $this->sendResponse($green_pin_activate,getMessageText('fetch'));
  
        }
        else
        {
          return $this->sendError(getMessageText('fetch',false));
  
  
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestCardActivationRequest $request, $id)
    {
        $validatedData =$request->validated();

        $mobilenumber_data=Green_pin_activate::find($id);

        $userinfo=getUserDetail();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mobile_data = Green_pin_activate::find($id);

        if (!$mobile_data) {
            return $this->sendError(getMessageText('delete',false));

        }

        $userdetail=getUserDetail();
            
        $userId = $userdetail->id;
        $mobile_data->update(['archived_by' => $userId]);
        $delete=$mobile_data->delete();
        if($delete)
        {
            return $this->sendResponse(true,getMessageText('delete'));

        }
        else
        {
           return $this->sendError(getMessageText('delete',false));

        }
    }
}
