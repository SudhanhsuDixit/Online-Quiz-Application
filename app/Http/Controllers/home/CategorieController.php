<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategorieController extends Controller
{
    public function AddCategorie()
    {
       return view('adminbackend.categorie_page.add_categorie');
    }// End Method
 
 
 public function StoreCategorie(Request $request){
 
    if($request->file('categorie_image')){
        $manager =new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('categorie_image')->getClientOriginalExtension();
        $img=$manager->read($request->file('categorie_image'));
        $img=$img->resize(370,246);
        
        $img->toJpeg(80)->save(base_path('public/upload/categorie/'.$name_gen));
        $save_url = 'upload/categorie/'.$name_gen;
 
       Categorie::insert([
        'col_name' => $request->col_name,
        'title' => $request->title,
        'course_no' => $request->course_no,
        'categorie_image' => $save_url, 
    ]);
 }
 
   $notification = array(
        'message' => 'Categorie Inserted Successfully',
        'alert-type' => 'info'
    );
 
    return redirect()->route('all.categorie')->with($notification); 
 
 }// End Method
 
 public function allCategorie(){
    $categorie= Categorie::get();
    return view('adminbackend.categorie_page.all_categorie',compact('categorie'));
 }
 
 public function editCategorie($id){
    $categorie = Categorie::where('id',$id)->first();
    return view('adminbackend.categorie_page.edit_categorie',compact('categorie'));
 }
 
 
 
 
 public function UpdateCategorie(Request $request){

    $categorie_id = $request->id;
    $old_img = $request->old_image;

    if($request->file('categorie_image')){
        $manager =new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('categorie_image')->getClientOriginalExtension();
        $img=$manager->read($request->file('categorie_image'));
        $img=$img->resize(370,246);
        
        $img->toJpeg(80)->save(base_path('public/upload/categorie/'.$name_gen));
        $save_url = 'upload/categorie/'.$name_gen;

    if (file_exists($old_img)) {
       unlink($old_img);
    }

    Categorie::findOrFail($categorie_id)->update([
        'col_name' => $request->col_name,
        'title' => $request->title,
        'course_no' => $request->course_no,
        'categorie_image' => $save_url, 
    ]);

   $notification = array(
        'message' => 'Categorie Updated with image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.categorie')->with($notification); 

    } else {

        Categorie::findOrFail($categorie_id)->update([
            'col_name' => $request->col_name,
            'title' => $request->title,
            'course_no' => $request->course_no,
    ]);

   $notification = array(
        'message' => 'Categorie Updated without image Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.categorie')->with($notification); 

    } // end else

}// End Method
 
 
 public function DeleteCategorie( $id){
        
    Categorie::destroy($id);
    return back()->withSuccess('Categorie deleted Successfull!!!');
 }

}
