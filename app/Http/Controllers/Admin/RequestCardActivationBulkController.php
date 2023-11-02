<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Green_pin_activate;
use App\Http\Requests\StoreRequestCardActivationBulkRequest;
use App\Imports\ImportRequestCardActivation;
use Maatwebsite\Excel\Facades\Excel;


use DataTables;


class RequestCardActivationBulkController extends BaseController
{
    public function __construct(){

        $this->folder='admin.request-card-activation-bulk';
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
            $data = Green_pin_activate::select('*')->where('isbulk','Y')->orderBy('id', 'asc');
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

         $title='Requested Mobile Number In Bulk List';
         $form_title='Request Mobile Number Bulk';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder','access'));
    }

    public function store(StoreRequestCardActivationBulkRequest $request){
        Excel::import(new ImportRequestCardActivation($request), 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
}
