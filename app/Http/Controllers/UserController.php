<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
    public function UserDashboard(){
     
        
        return view('frontend.User.user_dashboard')->with('success', 'User login successful!');
    }

    public function UserCourses(){
        return view('frontend.User.courses');
    }
    
    public function MasterCourses(){
        return view('frontend.User.courses1');
    }
    
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.profile.user_profile_view',compact('userData'))->with('message','The post has been added');
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('frontend.profile.user_profile_edit',compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
       

        if ($request->file('photo')) {
           $file = $request->file('photo');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/user_images'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    }

    public function ChangePassword(){
        return view('frontend.profile.user_change_password');
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
