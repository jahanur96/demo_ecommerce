<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    
    public function index()
    {
        $title = "All Page";
        $page=DB::table('pages')->latest()->get();
        return view('admin.settings.page.index',compact('page','title'));
    }

      //page create form
      public function create()
      {
          $title = "Add Page";
          return view('admin.settings.page.create',compact('title'));
      }
  
      //page store
      public function store(Request $request)
      {
          $data=array();
          $data['page_position']=$request->page_position;
          $data['page_name']=$request->page_name;
          $data['page_slug']=Str::slug($request->page_name, '-');
          $data['page_title']=$request->page_title;
          $data['page_description']=$request->page_description;
          DB::table('pages')->insert($data);
          $notification = array(
            'message' => 'Page Added successfylly!',
            'alert-type' => 'success'
        );
        return redirect()->route('page.index')->with($notification);
  
      }
  
      //page delete
      public function destroy($id)
      {
          DB::table('pages')->where('id',$id)->delete();
          $notification = array(
            'message' => 'Page Deleted successfylly!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
      }
  
      //page edit
      public function edit($id)
      {
          $title = "Update Page";
          $page=DB::table('pages')->where('id',$id)->first();
          return view('admin.settings.page.edit',compact('page','title'));
      }
  
  
      //page update
      public function update(Request $request,$id)
      {
          $data=array();
          $data['page_position']=$request->page_position;
          $data['page_name']=$request->page_name;
          $data['page_slug']=Str::slug($request->page_name, '-');
          $data['page_title']=$request->page_title;
          $data['page_description']=$request->page_description;
          DB::table('pages')->where('id',$id)->update($data);
          $notification = array(
            'message' => 'Page Updated successfully !',
            'alert-type' => 'info'
        );
        return redirect()->route('page.index')->with($notification);
      }
  
}
