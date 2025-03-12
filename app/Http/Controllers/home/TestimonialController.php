<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    public function AddTestimonial()
    {
       return view('adminbackend.testimonial_page.add_testimonial');
    }// End Method
 
 
 public function StoreTestimonial(Request $request){
 
    if($request->file('testimonial_image')){
        $manager =new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('testimonial_image')->getClientOriginalExtension();
        $img=$manager->read($request->file('testimonial_image'));
        $img=$img->resize(370,246);
        
        $img->toJpeg(80)->save(base_path('public/upload/testimonial/'.$name_gen));
        $save_url = 'upload/testimonial/'.$name_gen;
 
       Testimonial::insert([
        'profession' => $request->profession,
        'client_name' => $request->client_name,
        'description' => $request->description,
        'testimonial_image' => $save_url, 
    ]);
 }
 
   $notification = array(
        'message' => 'Testimonial Inserted Successfully',
        'alert-type' => 'info'
    );
 
    return redirect()->route('all.testimonial')->with($notification); 
 
 }// End Method
 
 public function allTestimonial(){
    $testimonial= Testimonial::get();
    return view('adminbackend.testimonial_page.all_testimonial',compact('testimonial'));
 }
 
 public function editTestimonial($id){
    $testimonial = Testimonial::where('id',$id)->first();
    return view('adminbackend.testimonial_page.edit_testimonial',compact('testimonial'));
 }
 
 
 
 
 public function UpdateTestimonial(Request $request){

    $testimonial_id = $request->id;
    $old_img = $request->old_image;

    if($request->file('testimonial_image')){
        $manager =new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('testimonial_image')->getClientOriginalExtension();
        $img=$manager->read($request->file('testimonial_image'));
        $img=$img->resize(370,246);
        
        $img->toJpeg(80)->save(base_path('public/upload/testimonial/'.$name_gen));
        $save_url = 'upload/testimonial/'.$name_gen;

    if (file_exists($old_img)) {
       unlink($old_img);
    }

    Testimonial::findOrFail($testimonial_id)->update([
        'profession' => $request->profession,
        'client_name' => $request->client_name,
        'description' => $request->description,
        'testimonial_image' => $save_url, 
    ]);

   $notification = array(
        'message' => 'Testimonial Updated with image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.testimonial')->with($notification); 

    } else {

        Testimonial::findOrFail($testimonial_id)->update([
            'profession' => $request->profession,
            'client_name' => $request->client_name,
            'description' => $request->description,
    ]);

   $notification = array(
        'message' => 'Testimonial Updated without image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.testimonial')->with($notification); 

    } // end else

}// End Method
 
 
 public function DeleteTestimonial( $id){
        
    Testimonial::destroy($id);
    return back()->withSuccess('testimonial deleted Successfull!!!');
 }

}
