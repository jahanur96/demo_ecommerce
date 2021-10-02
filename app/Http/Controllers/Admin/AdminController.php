<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function adminLogout()
    {
        $logout = Auth::logout();
        $notification = array('messege' => 'You are logged out!','alert-type'=>'success');
        return redirect()->route('admin.login')->with('notification');
        

    }

}
