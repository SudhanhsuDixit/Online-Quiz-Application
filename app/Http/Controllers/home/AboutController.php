<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{

    public function AllAbout()
    {
        $about= About::get();
        return view('adminbackend.about_page.all_about',compact('about'));
     }

    public function AddAbout()
    {
       return view('adminbackend.about_page.add_about');
    }

    public function StoreAbout(Request $request){

        if($request->file('about_image')){
            $manager =new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('about_image')->getClientOriginalExtension();
            $img=$manager->read($request->file('about_image'));
            $img=$img->resize(370,246);
            
            $img->toJpeg(80)->save(base_path('public/upload/about/'.$name_gen));
            
            $save_url = 'upload/about/'.$name_gen;
     
           About::insert([
            'about_image' => $save_url, 
            'title' => $request->title,
            'description_one' => $request->description_one,
            'description_two' => $request->description_two,
            'link_one' => $request->link_one,
            'link_two' => $request->link_two,
            'link_three' => $request->link_three,
            'link_four' => $request->link_four,
            'link_five' => $request->link_five,
            'link_six' => $request->link_six,
        ]);
     }
     
       $notification = array(
            'message' => 'About Inserted Successfully',
            'alert-type' => 'info'
        );
     
        return redirect()->route('all.service')->with($notification); 
     
     }// End Method

     public function EditAbout($id){
        $about = About::where('id',$id)->first();
        return view('adminbackend.about_page.edit_about',compact('about'));
     }

     public function UpdateAbout(Request $request){

      $about_id = $request->id;
      $old_img = $request->old_image;
      
      if($request->file('service_image')){
          $manager =new ImageManager(new Driver());
          $name_gen = hexdec(uniqid()).'.'.$request->file('about_image')->getClientOriginalExtension();
          $img=$manager->read($request->file('about_image'));
          $img=$img->resize(370,246);
          
          $img->toJpeg(80)->save(base_path('public/upload/about/'.$name_gen));
          $save_url = 'upload/about/'.$name_gen;
      
      if (file_exists($old_img)) {
         unlink($old_img);
      }
      
      About::findOrFail($about_id)->update([
         'about_image' => $save_url, 
         'title' => $request->title,
         'description_one' => $request->description_one,
         'description_two' => $request->description_two,
         'link_one' => $request->link_one,
         'link_two' => $request->link_two,
         'link_three' => $request->link_three,
         'link_four' => $request->link_four,
         'link_five' => $request->link_five,
         'link_six' => $request->link_six,
      ]);
      
      $notification = array(
          'message' => 'About Updated with image Successfully',
          'alert-type' => 'success'
      );
      
      return redirect()->route('all.about')->with($notification); 
   }
       else {
      
          About::findOrFail($about_id)->update([
            'title' => $request->title,
            'description_one' => $request->description_one,
            'description_two' => $request->description_two,
            'link_one' => $request->link_one,
            'link_two' => $request->link_two,
            'link_three' => $request->link_three,
            'link_four' => $request->link_four,
            'link_five' => $request->link_five,
            'link_six' => $request->link_six,
      ]);
 
}
$notification = array(
   'message' => 'About Updated without image Successfully',
   'alert-type' => 'success'
);
return redirect()->route('all.about')->with($notification); 

     }
   
   }