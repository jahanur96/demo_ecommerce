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

    // smtp settings
    public function smtp_index ()
    {
        $title = "SMTP settings";
        $smtp=DB::table('smtps')->first();
        return view('admin.settings.seo.smtp.smtp',compact('smtp','title'));
    }

    //smtp update
    public function smtpUpdate(Request $request,$id){
       
        $data=array();
        $data['mailer']=$request->mailer;
        $data['host']=$request->host;
        $data['port']=$request->port;
        $data['user_name']=$request->user_name;
        $data['password']=$request->password;
        DB::table('smtps')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'SMTP Setting Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

        // foreach($request->types as $key=>$type){
        //     $this->updateEnvFile($type, $request[$type]);
        // }
        // $notification=array('messege' => 'SMTP Setting Updated!', 'alert-type' => 'success');
        // return redirect()->back()->with($notification);
    }


    

}
