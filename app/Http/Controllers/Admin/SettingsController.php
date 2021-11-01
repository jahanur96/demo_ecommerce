<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller; 
use Image;
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


    //website setting
    public function website()
    {
        $setting=DB::table('settings')->first();
        return view('admin.settings.website_setting',compact('setting'));
    }


    //website setting update
    public function WebsiteUpdate(Request $request,$id)
    {
        $data=array();
        $data['currency']=$request->currency;
        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['main_email']=$request->main_email;
        $data['support_email']=$request->support_email;
        $data['address']=$request->address;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['linkedin']=$request->linkedin;
        $data['youtube']=$request->youtube;
        if ($request->logo) {  //jodi new logo die thake
              $logo=$request->logo;
              $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();
            //   Image::make($logo)->resize(320,120)->save('public/uploads/files/setting/'.$logo_name); 
            Image::make($logo)->resize(320,120)->save('public/uploads/files/setting/'.$logo_name);  //image intervention
            
            $data['logo']=$logo_name;  
        }else{   //jodi new logo na dey
            $data['logo']=$request->old_logo;
        }

        if ($request->favicon) {  //jodi new logo die thake
              $favicon=$request->favicon;
              $favicon_name=uniqid().'.'.$favicon->getClientOriginalExtension();
              Image::make($favicon)->resize(32,32)->save('public/uploads/files/setting/'.$favicon_name); 
              $data['favicon']=$favicon_name;  
        }else{   //jodi new logo na dey
            $data['favicon']=$request->old_favicon;
        }

        DB::table('settings')->where('id',$id)->update($data);
        
        $notification = array(
            'message' => 'Setting Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }




    

}
