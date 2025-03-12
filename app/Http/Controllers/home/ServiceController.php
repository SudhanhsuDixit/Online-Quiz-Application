<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ServiceController extends Controller
{

   public function AddService()
   {
      return view('adminbackend.service_page.add_service');
   }// End Method


public function StoreService(Request $request){

   if($request->file('service_image')){
       $manager =new ImageManager(new Driver());
       $name_gen = hexdec(uniqid()).'.'.$request->file('service_image')->getClientOriginalExtension();
       $img=$manager->read($request->file('service_image'));
       $img=$img->resize(370,246);
       
       $img->toJpeg(80)->save(base_path('public/upload'.$name_gen));
       $save_url = 'upload'.$name_gen;

      service::insert([
       'title' => $request->title,
       'description' => $request->description,
       'service_image' => $save_url, 
   ]);
}

  $notification = array(
       'message' => 'Service Inserted Successfully',
       'alert-type' => 'info'
   );

   return redirect()->route('all.service')->with($notification); 

}// End Method

public function allService(){
   $service= service::get();
   return view('adminbackend.service_page.all_service',compact('service'));
}

public function editService($id){
   $service = service::where('id',$id)->first();
   return view('adminbackend.service_page.edit_service',compact('service'));
}




public function UpdateService(Request $request){

   $service_id = $request->id;
   $old_img = $request->old_image;
   
   if($request->file('service_image')){
       $manager =new ImageManager(new Driver());
       $name_gen = hexdec(uniqid()).'.'.$request->file('service_image')->getClientOriginalExtension();
       $img=$manager->read($request->file('service_image'));
       $img=$img->resize(370,246);
       
       $img->toJpeg(80)->save(base_path('public/upload/service/'.$name_gen));
       $save_url = 'upload/service/'.$name_gen;
   
   if (file_exists($old_img)) {
      unlink($old_img);
   }
   
   service::findOrFail($service_id)->update([
       'title' => $request->banner_title,
       'description' => $request->description,
       'service_image' => $save_url, 
   ]);
   
   $notification = array(
       'message' => 'Service Updated with image Successfully',
       'alert-type' => 'success'
   );
   
   return redirect()->route('all.service')->with($notification); 
   
   } else {
   
       service::findOrFail($service_id)->update([
       'title' => $request->title,
       'description' => $request->description, 
   ]);
   
   $notification = array(
       'message' => 'Service Updated without image Successfully',
       'alert-type' => 'success'
   );
   
   return redirect()->route('all.service')->with($notification); 
   
   } // end else
   

}// End Method



public function DeleteService( $id){
        
   service::destroy($id);
   return back()->withSuccess('Service deleted Successfull!!!');
}

}
