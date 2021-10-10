<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class ChildCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function childcategory_index(Request $request)

    {
        
        if($request->ajax()){
            $data = DB::table('childcategories')
            ->leftJoin('categories','childcategories.category_id','=','categories.id')
            ->leftJoin('subcategories','childcategories.subcategory_id','=','subcategories.id')
            ->select('categories.category_name','subcategories.subcategory_name','childcategories.*')
            ->get();
            
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $actionbtn = '<button class="btn btn-primary btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editCategory"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="edit"></i></button>
                    <a href="#" id="delete" class="btn btn-warning btn-sm"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="delete"></i></a>';
                    return $actionbtn;
                
                })
                ->rowColumns('action')
                ->make(true);


        }

        return view('admin.category.childcategory.childcategory_index');
    }

}
