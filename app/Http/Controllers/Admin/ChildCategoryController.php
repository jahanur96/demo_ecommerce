<?php

namespace App\Http\Controllers\Admin;

use DB;
use DataTables;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;

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
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionbtn = '<button class="btn btn-primary btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editCategory"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="edit"></i></button>
                    <a href="'.route('childcategory.delete',[$row->id]).'" id="delete" class="btn btn-warning btn-sm"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="delete"></i></a>';
                    return $actionbtn;
                
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Child Category';
        $categories = Category::all();
        return view('admin.category.childcategory.childcategory_index',compact('title','categories'));
    }

    public function childcategory_add(Request $request)
    {
        // dd($request->subcategory_id);
        $catid = Subcategory::where('id',$request->subcategory_id)->first()->category_id;
        // dd($catid);
        $childCategory = new Childcategory();
        $childCategory->childcategory_name = $request->childcategory_name;
        $childCategory->childcategory_slug = Str::slug($request->childcategory_name,'-');
        $childCategory->category_id = $catid;
        $childCategory->subcategory_id = $request->subcategory_id;
        $save = $childCategory->save();
        if($save){
            $notification = array(
                'message' => 'Child Category created successfully!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }

    public function childcategory_delete($id)
    {
        $childCategory = Childcategory::findOrFail($id);
        $childCategory->delete();
        $notification = array(
            'message' => 'Child Category Deleted parmanently !',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function childcategory_edit($id)
    {
        
        $categories = Category::all();
        $child_cat = Childcategory::find($id);
        // dd($child_cat);

        return view('admin.category.childcategory.child_category_edit',compact('categories','child_cat'));
    }
    public function childcategory_update(Request $request,$id)
    {
        $catid = Subcategory::where('id',$request->subcategory_id)->first()->category_id;
        // dd($catid);
        $childCategory = Childcategory::find($id);
        $childCategory->childcategory_name = $request->childcategory_name;
        $childCategory->childcategory_slug = Str::slug($request->childcategory_name,'-');
        $childCategory->category_id = $catid;
        $childCategory->subcategory_id = $request->subcategory_id;
        $save = $childCategory->update();
        if($save){
            $notification = array(
                'message' => 'Child Category Updated successfully!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }
    



}
