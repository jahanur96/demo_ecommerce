<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category_index()
    {
        $data = Category::all();
        return view('admin.category.category.category_index',compact('data'));
    }
    
    public function category_add(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        $slug = Str::slug($request->category_name, '-');
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $slug;
        $data = $category->save();
        if($data){
            $notification = array(
                'message' => 'Category created successfully!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }

        // category_edit
    public function category_edit($id)
    {
        $data = Category::find($id);
        
        return response()->json($data);
    }
    // category_update
    public function category_update(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->category_slug = Str::slug($request->category_name, '-');
        $data->update();

        $notification = array(
            'message' => 'Category Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }



     // Category delete
     public function category_delete($id)
     {
        $category = Category::find($id);
        $delete = $category->delete();
        if($delete){
            $notification = array(
                'message' => 'Category Deleted successfully!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
           
         

     }
     
}

