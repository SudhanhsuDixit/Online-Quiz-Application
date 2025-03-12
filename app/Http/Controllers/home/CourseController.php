<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CourseController extends Controller
{
    public function AllCourse()
    {
        $course= Course::get();
        return view('adminbackend.course_page.all_course',compact('course'));
     }

    public function AddCourse()
    {
       return view('adminbackend.course_page.add_course');
    }

    public function StoreCourse(Request $request){

        if($request->file('course_image')){
            $manager =new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('course_image')->getClientOriginalExtension();
            $img=$manager->read($request->file('course_image'));
            $img=$img->resize(370,246);
            
            $img->toJpeg(80)->save(base_path('public/upload/course/'.$name_gen));
            
            $save_url = 'upload/course/'.$name_gen;
     
           Course::insert([
            'course_image' => $save_url, 
            'read_more' => $request->read_more,
            'join_now' => $request->join_now,
            'course_price' => $request->course_price,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_time' => $request->course_time,
            'course_students' => $request->course_students,
            
        ]);
     }
     
       $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'info'
        );
     
        return redirect()->route('all.course')->with($notification); 
     
     }// End Method

     public function EditCourse($id){
        $course = Course::where('id',$id)->first();
        return view('adminbackend.course_page.edit_course',compact('course'));
     }

     public function UpdateCourse(Request $request){

        $about_id = $request->id;
        $old_img = $request->old_image;
        
        if($request->file('course_image')){
            $manager =new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('course_image')->getClientOriginalExtension();
            $img=$manager->read($request->file('course_image'));
            $img=$img->resize(370,246);
            
            $img->toJpeg(80)->save(base_path('public/upload/course/'.$name_gen));
            $save_url = 'upload/course/'.$name_gen;
        
        if (file_exists($old_img)) {
           unlink($old_img);
        }
        
        Course::findOrFail($about_id)->update([
            'course_image' => $save_url, 
            'read_more' => $request->read_more,
            'join_now' => $request->join_now,
            'course_price' => $request->course_price,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_time' => $request->course_time,
            'course_students' => $request->course_students,
        ]);
        
        $notification = array(
            'message' => 'Course Updated with image Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.course')->with($notification); 
     }
         else {
        
            Course::findOrFail($about_id)->update([
               'read_more' => $request->read_more,
               'join_now' => $request->join_now,
               'course_price' => $request->course_price,
               'course_title' => $request->course_title,
               'course_name' => $request->course_name,
               'course_time' => $request->course_time,
               'course_students' => $request->course_students,
        ]);
   
  }
  $notification = array(
     'message' => 'Course Updated without image Successfully',
     'alert-type' => 'success'
  );
  return redirect()->route('all.course')->with($notification); 
  
       }
  
       public function DeleteCourse( $id){
          
        Course::destroy($id);

        $notification = array(
         'message' => 'Course Deleted  Successfully',
         'alert-type' => 'success'
      );
        return back()->with($notification);
     }
}
