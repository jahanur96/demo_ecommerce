<?php

namespace App\Http\Controllers\Admin;
use DB;
use DataTables;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function brand_index(Request $request)
    {
        if($request->ajax()){
            $data = Brand::orderBy('id','DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('front_page', function($data) {
                    return $data->front_page ? 'Front Page' : '';
                })
                ->addColumn('action', function($row){
                    $actionbtn = '<button class="btn btn-primary btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editCategory"><i class="fas fa-edit" data-toggle="tooltip" data-placement="left" title="edit"></i></button>
                    <a href="'.route('brand.delete',[$row->id]).'" id="delete" class="btn btn-warning btn-sm"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="delete"></i></a>';
                    return $actionbtn;
                
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'Brand';
        return view('admin.brand.brand_index',compact('title'));
        
    }

    public function brand_add(Request $request)
    {
        
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands',
            'brand_logo' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096'
        ]);

        $brand = new Brand();
        $slug = Str::slug($request->brand_name, '-');
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = $slug;
        if($request->file('brand_logo')){
            
            $photo = $request->brand_logo;
            $photo_name = $slug.'.'.$photo->getClientOriginalExtension();
            // dd($request->file('brand_logo'));
            // $photo->move('public/uploads/brand/',$photo_name); // normal upload
            Image::make($photo)->resize(240,120)->save('public/uploads/brand/'.$photo_name);  //image intervention
            $brand->brand_logo = $photo_name;
       
        }
       
        $brand_insert = $brand->save();
        if($brand_insert){
            $notification = array(
                'message' => 'Brand created successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function brand_delete($id)
    {
        $data = Brand::findOrFail($id);
        $image = $data->brand_logo;
       
        if(File::exists(public_path('uploads/brand/'.$image))){
            $public_path = str_replace('\\','/',public_path());
            unlink($public_path.'/uploads/brand/'.$image);
            $delete = $data->delete();
        }else{
            $delete = $data->delete();
        }
        if($delete){
            $notification = array(
                'message' => 'Brand Deleted successfully!',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }

    
}
