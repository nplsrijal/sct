<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Card_status_update;
use App\Http\Requests\StoreCardStatusUpdateRequest;
use App\Http\Requests\UpdateCardStatusUpdateRequest;

use DataTables;


class CardStatusUpdateController extends BaseController
{
    public function __construct(){

        $this->folder='admin.card-status';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check button access
        $access=checkAccessPrivileges('card-status-update');
        if ($request->ajax()) {
            $data = Card_status_update::join('users', 'card_status_updates.created_by', '=', 'users.id')
            ->where('isbulk','N')->orderBy('id', 'asc')
            ->get(['card_status_updates.*','users.fname','users.lname']);

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) use($access){
     
                     $btn='';
                     if($access['isedit']=='Y' && $row->status =='P')
                     {
                        $btn .= "<a href='javascript:void(0)' class='edit btn btn-primary btn-sm editData' data-pid='".$row->id."' data-url=".route('card-status-update.show',"$row->id")."><i class='fas fa-edit'></i> Edit</a>";

                     }
                     if($access['isdelete']=='Y' && $row->status =='P')
                     {
                        $btn .= "&nbsp;<a href='javascript:void(0)' class='edit btn btn-danger btn-sm deleteData' data-pid='".$row->id."' data-url=".route('card-status-update.destroy',"$row->id")."><i class='fas fa-trash'></i> Delete</a>";

                     }
       
                    return $btn;
                    })
                    ->addColumn('created_by_name', function($row) {
                        return $row->fname.' '.$row->lname;
                    })
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Requested Card Status Update List';
         $form_title='Request Card Status Update';
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
    public function store(StoreCardStatusUpdateRequest $request)
    {

        
            $savedata =$request->validated();

            $userinfo=getUserDetail();
            $savedata['submitted_by']=$userinfo->id;
            $savedata['created_by']=$userinfo->id;
            $savedata['submitted_date']=date('Y-m-d H:i:s');
            $savedata['created_at']=$savedata['submitted_date'];

            $data_save=Card_status_update::create($savedata);
        
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
        $mobile_update=Card_status_update::find($id);
        if($mobile_update)
        {
          return $this->sendResponse($mobile_update,getMessageText('fetch'));
  
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
    public function update(UpdateCardStatusUpdateRequest $request, $id)
    {
        $validatedData =$request->validated();

        $mobilenumber_data=Card_status_update::find($id);

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
        $mobile_data = Card_status_update::find($id);

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
