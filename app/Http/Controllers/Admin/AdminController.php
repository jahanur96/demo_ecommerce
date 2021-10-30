<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $title  = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }

    public function admin_changePassword()
    {
        $title = "Admin Password Change";
        return view('admin.authAdmin.change-password',compact('title'));
    }



      //password Update
      public function admin_updatePassword(Request $request)
      {
          $validated = $request->validate([
             'old_password' => 'required',
             'password' => 'required|min:6|confirmed',
          ]);
  
          $current_password=Auth::user()->password;  //login user password get
  
  
          $oldpass=$request->old_password;  //oldpassword get from input field
          $new_password=$request->password;  // newpassword get for new password
          if (Hash::check($oldpass,$current_password)) {  //checking oldpassword and currentuser password same or not
                 $user=User::findorfail(Auth::id());    //current user data get
                 $user->password=Hash::make($request->password); //current user password hasing
                 $user->save();  //finally save the password
                 Auth::logout();  //logout the admin user anmd redirect admin login panel not user login panel
                 $notification = array(
                    'message' => 'Your Password has been Changed successfully !',
                    'alert-type' => 'success'
                );
                 return redirect()->route('admin.login')->with($notification);
          }else{
            
            $notification = array(
                'message' => 'Old Password Not Matched!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
          }
      }
  

    public function adminLogout()
    {
        $logout = Auth::logout();
        $notification = array('messege' => 'You are logged out!', 'alert-type' => 'success');
        return redirect()->route('admin.login')->with('notification');
    }
}
