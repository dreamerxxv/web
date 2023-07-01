<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile', compact('adminData'));
    }

    public function editProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        $data['title'] = 'Edit Profile';

        return view('admin.admin_editProfile', compact('editData'), $data);
    }

    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name     = $request->name;
        $data->username = $request->username;
        $data->email    = $request->email;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }

        $data->save();
        $notification = array(
            'message'    => 'Admin Profile Updated',
            'alert-type' => 'success'
        );

        return redirect('/admin/profile')->with($notification);
    }

    public function changePassword(){
        return view('admin.admin_changePassword');
    }

    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword'      => 'required',
            'newpassword'      => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedpassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);

            $users->save();
            session()->flash('message', 'Password updated');

            return redirect()->back();
        }else{
            session()->flash('message', 'Old password is not match');
            return redirect()->back();
        }
    }
}
