<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    public function __construct(){

        $this->folder='admin.category';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $users = Category::select('*')->orderBy('id', 'asc');
            return Datatables::of($users)
           
            ->addIndexColumn()
            ->addColumn('action', function($row){
     
                     $btn = "<a href='javascript:void(0)' class='edit btn btn-primary btn-sm editData' data-pid='".$row->id."' data-url=".route('category.show',"$row->id")."><i class='fas fa-edit'></i> Edit</a>";
                     $btn .= "&nbsp;<a href='javascript:void(0)' class='edit btn btn-danger btn-sm deleteData' data-pid='".$row->id."' data-url=".route('category.destroy',"$row->id")."><i class='fas fa-trash'></i> Delete</a>";
       
                    return $btn;
                    })
                    ->addColumn('categoryimage', function($row) {
                        return '<img src="uploads/category/'.$row->categoryimage.'"  style="width:50%" />';
                    })
            ->rawColumns(['action','categoryimage'])
            ->make(true);
         }
         else
         {
            $title='Category List';
            $form_title='Add Category';
            $folder=$this->folder;
           return view($this->folder.'.list',compact('title','form_title','folder'));

         }

         
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
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'categoryname' => 'required|string',
           // 'categoryimage' => 'required|string',
            'orderby' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            
            return $this->sendError($validator->errors()->all()[0],$validator->errors());

        }
        else
        {
         $savedata = $request->except('id');


         if($request->file('categoryimage')){
            $file= $request->file('categoryimage');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('admin/uploads/category'), $filename);
            $savedata['categoryimage']= $filename;
        }

         $data_save=Category::create($savedata);
       
        if($data_save)
        {
            return $this->sendResponse(true,getMessageText('insert'));

        }
        else
        {
           return $this->sendError(getMessageText('insert',false));

        }
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        if(isset($category->id))
      {
        return $this->sendResponse($category,getMessageText('fetch'));

      }
      else
      {
        return $this->sendError(getMessageText('fetch',false));


      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'categoryname' => 'required|string',
           // 'categoryimage' => 'required|string',
            'orderby' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            
            return $this->sendError($validator->errors()->all()[0],$validator->errors());

        }
        else
        {
            $savedata = $request->except('categoryimage');


            if($request->file('categoryimage')){
               $file= $request->file('categoryimage');
               $filename= date('YmdHi').$file->getClientOriginalName();
               $file-> move(public_path('admin/uploads/category'), $filename);
               $savedata['categoryimage']= $filename;
           }


         $data_save=$category->update($savedata);
       
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $isdel=$category->delete();
        if($isdel)
        {
            return $this->sendResponse(true,getMessageText('delete'));

        }
        else
        {
           return $this->sendError(getMessageText('delete',false));

        }
    }
}
