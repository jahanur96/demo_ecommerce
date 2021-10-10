<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function subcategory_index()
    {    
        // Query builder
        // $data = DB::table('subcategories')->leftJoin('categories','subcategories.category_id','=','categories.id')->select('categories.category_name','subcategories.*')->orderBy('subcategories.id','DESC')->get();
        
        // ORm
        $title  = 'Subcategory';
        $data = Subcategory::orderBy('id','ASC')->get();
        $categories = Category::orderBy('id','ASC')->get();
        return view('admin.category.subcategory.subcategory_index',compact('data','categories','title'));
    }

    // subcategory_add 
    public function subcategory_add(Request $request)
    {
       
        $validated = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);

        $subcategory = new Subcategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name,'-');
        $data = $subcategory->save();
   
        $data = $subcategory->save();
        if($data){
            $notification = array(
                'message' => 'Subcategory created successfully!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }

    // subcategory_edit
    public function subcategory_edit($id)
    {
        $categories = Category::all();
        $data = Subcategory::find($id);
        return view('admin.category.subcategory.subcategory_edit',compact('data','categories'));
    }

    // subcategory_update
    public function subcategory_update(Request $request)
    {
        $id = $request->id;
        $data = Subcategory::find($id);
        $data->category_id = $request->category_id;
        $data->subcategory_name = $request->subcategory_name;
        $data->subcategory_slug = Str::slug($request->subcategory_name, '-');
        $data->update();

        $notification = array(
            'message' => 'Sub Category Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // subcategory_delete
    public function subcategory_delete($id)
    {
        $subcategory = Subcategory::find($id);
        $data = $subcategory->delete();
        if($data){
            $notification = array(
                'message' => 'Subcategory Deleted!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);

    }


}
