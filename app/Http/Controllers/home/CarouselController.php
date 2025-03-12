<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CarouselController extends Controller
{
    public function AllCarousel()
    {
        $carousel= Carousel::get();
        return view('adminbackend.carousel_page.all_carousel',compact('carousel'));
     }

    public function AddCarousel()
    {
       return view('adminbackend.carousel_page.add_carousel');
    }

    public function StoreCarousel(Request $request){

        if($request->file('carousel_image')){
            $manager =new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('carousel_image')->getClientOriginalExtension();
            $img=$manager->read($request->file('carousel_image'));
            $img=$img->resize(370,246);
            
            $img->toJpeg(80)->save(base_path('public/upload/carousel/'.$name_gen));
            
            $save_url = 'upload/carousel/'.$name_gen;
     
           Carousel::insert([
            'carousel_image' => $save_url, 
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            
        ]);
     }
     
       $notification = array(
            'message' => 'Carousel Inserted Successfully',
            'alert-type' => 'info'
        );
     
        return redirect()->route('all.carousel')->with($notification); 
     
     }// End Method

     public function EditCarousel($id){
        $carousel = Carousel::where('id',$id)->first();
        return view('adminbackend.carousel_page.edit_carousel',compact('carousel'));
     }

     public function UpdateCarousel(Request $request){

      $about_id = $request->id;
      $old_img = $request->old_image;
      
      if($request->file('carousel_image')){
          $manager =new ImageManager(new Driver());
          $name_gen = hexdec(uniqid()).'.'.$request->file('carousel_image')->getClientOriginalExtension();
          $img=$manager->read($request->file('carousel_image'));
          $img=$img->resize(370,246);
          
          $img->toJpeg(80)->save(base_path('public/upload/carousel/'.$name_gen));
          $save_url = 'upload/carousel/'.$name_gen;
      
      if (file_exists($old_img)) {
         unlink($old_img);
      }
      
      Carousel::findOrFail($about_id)->update([
         'carousel_image' => $save_url, 
         'title' => $request->title,
         'sub_title' => $request->sub_title,
         'description' => $request->description,
      ]);
      
      $notification = array(
          'message' => 'Carousel Updated with image Successfully',
          'alert-type' => 'success'
      );
      
      return redirect()->route('all.carousel')->with($notification); 
   }
       else {
      
          Carousel::findOrFail($about_id)->update([
         'title' => $request->title,
         'sub_title' => $request->sub_title,
         'description' => $request->description,
      ]);
 
}
$notification = array(
   'message' => 'Carousel Updated without image Successfully',
   'alert-type' => 'success'
);
return redirect()->route('all.carousel')->with($notification); 

     }

     public function DeleteCarousel( $id){
        
      Carousel::destroy($id);
      return back()->withSuccess('Carousel deleted Successfull!!!');
   }
   
}
      