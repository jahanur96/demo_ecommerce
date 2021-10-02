<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    

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
        // dd($category);
        
    
    }
}
