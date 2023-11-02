<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Account_update;
use App\Http\Requests\StoreAccountUpdateBulkRequest;
use App\Imports\ImportAccountUpdate;
use Maatwebsite\Excel\Facades\Excel;



use DataTables;

class AccountUpdateBulkController extends BaseController
{
    public function __construct(){

        $this->folder='admin.account-update-bulk';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //check button access
        $access=checkAccessPrivileges('account-update');
        if ($request->ajax()) {
            $data = Account_update::select('*')->where('isbulk','Y')->orderBy('id', 'asc');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) use($access){
     
                     $btn='';
                     if($access['isedit']=='Y' && $row->status =='P')
                     {
                        $btn .= "<a href='javascript:void(0)' class='edit btn btn-primary btn-sm editData' data-pid='".$row->id."' data-url=".route('request-mobilenumber.show',"$row->id")."><i class='fas fa-edit'></i> Edit</a>";

                     }
                     if($access['isdelete']=='Y' && $row->status =='P')
                     {
                        $btn .= "&nbsp;<a href='javascript:void(0)' class='edit btn btn-danger btn-sm deleteData' data-pid='".$row->id."' data-url=".route('request-mobilenumber.destroy',"$row->id")."><i class='fas fa-trash'></i> Delete</a>";

                     }
       
                    return $btn;
                    })
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Requested Account Update Bulk List';
         $form_title='Request Account Update Bulk';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder','access'));
    }

    public function store(StoreAccountUpdateBulkRequest $request){
        Excel::import(new ImportAccountUpdate($request), 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
}
