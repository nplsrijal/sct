<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRegisterUpiBinRequest;
use App\Models\Upi_bin;



class RegisterUpiBinController extends BaseController
{
    public function __construct(){

        $this->folder='admin.registerupibin';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Register New UPIBIN';
        $form_title=$title;
        $folder=$this->folder;

       return view($this->folder.'.list',compact('title','form_title','folder'));

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
    public function store(StoreRegisterUpiBinRequest $request)
    {
        
        $savedata =$request->validated();

        $userinfo=getUserDetail();
        $savedata['submitted_by']=$userinfo->id;
        $savedata['created_by']=$userinfo->id;
        $savedata['submitted_date']=date('Y-m-d H:i:s');
        $savedata['created_at']=$savedata['submitted_date'];

        $data_save=Upi_bin::create($savedata);
    
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
