<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function seo_index()
    {
        $data=DB::table('seos')->first();
        $title = 'Seo Settings';
        return view('admin.settings.seo.seo',compact('data','title'));
    }
    public function seoUpdate(Request $request,$id)
    {
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_keyword']=$request->meta_keyword;
        $data['meta_description']=$request->meta_description;
        $data['google_verification']=$request->google_verification;
        $data['alexa_verification']=$request->alexa_verification;
        $data['google_analytics']=$request->google_analytics;
        $data['google_adsense']=$request->google_adsense;
        DB::table('seos')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'SEO Setting Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        

    }

    

}
