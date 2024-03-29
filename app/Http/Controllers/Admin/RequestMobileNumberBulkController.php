<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Mobile_update;
use App\Http\Requests\StoreRequestMobileNumberBulkRequest;
use App\Imports\ImportRequestMobileNumber;
use Maatwebsite\Excel\Facades\Excel;



use DataTables;

class RequestMobileNumberBulkController extends BaseController
{
    public function __construct(){

        $this->folder='admin.request-mobilenumber-bulk';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //check button access
        $access=checkAccessPrivileges('request-mobile-number');
        if ($request->ajax()) {
            $data = Mobile_update::join('users', 'mobile_updates.created_by', '=', 'users.id')
            ->where('isbulk','Y')->orderBy('id', 'asc')
            ->get(['mobile_updates.*','users.fname','users.lname']);

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
                    ->addColumn('created_by_name', function($row) {
                        return $row->fname.' '.$row->lname;
                    })
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Requested Mobile Number In Bulk List';
         $form_title='Request Mobile Number Bulk';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder','access'));
    }

    public function store(StoreRequestMobileNumberBulkRequest $request){
        Excel::import(new ImportRequestMobileNumber($request), 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
}
