<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Card_status_update;
use App\Http\Requests\StoreCardStatusUpdateBulkRequest;
use App\Imports\ImportCardStatusUpdate;
use Maatwebsite\Excel\Facades\Excel;



use DataTables;

class CardStatusUpdateBulkController extends BaseController
{
    //
    public function __construct(){

        $this->folder='admin.card-status-update-bulk';
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
            $data = Card_status_update::select('*')->where('isbulk','Y')->orderBy('id', 'asc');
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
            ->rawColumns(['action'])
            ->make(true);
         }

         $title='Requested Card Status Update In Bulk List';
         $form_title='Request Card Status Update Bulk';
         $folder=$this->folder;
        return view($this->folder.'.list',compact('title','form_title','folder','access'));
    }

    public function store(StoreCardStatusUpdateBulkRequest $request){
        Excel::import(new ImportCardStatusUpdate($request), 
                      $request->file('file')->store('files'));
        return redirect()->back();
    }
}
