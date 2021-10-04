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
        $data = Subcategory::orderBy('id','ASC')->get();
        $categories = Category::orderBy('id','ASC')->get();
        return view('admin.category.subcategory.subcategory_index',compact('data','categories'));
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


}
