<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('adminbackend.admin_master');
    }

    public function AdminLogin(){
        return view('adminbackend.Admin.login');
    }

    public function showLoginForm()
    {
        return view('adminbackend.Admin.login');
    }

    public function UserLogin(){
        return view('adminbackend.Admin.userlogin');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('adminbackend.admin_profile_view',compact('adminData'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('adminbackend.admin_profile_edit',compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
       

        if ($request->file('photo')) {
           $file = $request->file('photo');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('adminbackend.admin_change_password');
    }

    public function UpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldpassword,$hashedPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');

            return redirect()->back();
        }
        else{
            session()->flash('message','Old Password Is Not Matched');
            return redirect()->back();
        }
    }

}
