<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\Home\ServiceController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\CarouselController;
use App\Http\Controllers\Home\CourseController;
use App\Http\Controllers\Home\TestimonialController;
use App\Http\Controllers\Home\CategorieController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('frontend.master');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/change/password',[AdminController::class,'ChangePassword'])->name('change.password');
    Route::post('/update/password',[AdminController::class,'UpdatePassword'])->name('update.password');
});

require __DIR__.'/auth.php'; 

Route::get('/admin/login', [AdminController::class, 'AdminLogin']);

Route::middleware(['auth','role:admin'])->group(function (){
   
  
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('question');
    Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::get('/edit/profile',[AdminController::class,'EditProfile'])->name('edit.profile');
    Route::post('/store/profile',[AdminController::class,'StoreProfile'])->name('store.profile');

    Route::any('/add/dashboard',[QuestionController::class,'add']);

    Route::any('/question',[QuestionController::class,'show'])->name('question1');
    Route::any('/update/dashboard',[QuestionController::class,'update']);
    Route::any('/delete',[QuestionController::class,'delete']);

//service controller
Route::controller(ServiceController::class)->group(function () {
    Route::get('/all/service', 'allService')->name('all.service');
    
      Route::get('/add/service', 'AddService')->name('add.service');
      Route::post('/store/service', 'StoreService')->name('store.service');
      Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
      Route::post('/update/service', 'UpdateService')->name('update.service');
       Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');
 });

 //about controller
Route::controller(AboutController::class)->group(function () {
    Route::get('/all/about', 'AllAbout')->name('all.about');
    
      Route::get('/add/about', 'AddAbout')->name('add.about');
      Route::post('/store/about', 'StoreAbout')->name('store.about');
      Route::get('/edit/about/{id}', 'EditAbout')->name('edit.about');
      Route::post('/update/about', 'UpdateAbout')->name('update.about');
      Route::get('/delete/about/{id}', 'DeleteAbout')->name('delete.about');
 });


  //carousel controller
Route::controller(CarouselController::class)->group(function () {
      Route::get('/all/carousel', 'AllCarousel')->name('all.carousel');
      Route::get('/add/carousel', 'AddCarousel')->name('add.carousel');
      Route::post('/store/carousel', 'StoreCarousel')->name('store.carousel');
      Route::get('/edit/carousel/{id}', 'EditCarousel')->name('edit.carousel');
      Route::post('/update/carousel', 'UpdateCarousel')->name('update.carousel');
      Route::get('/delete/carousel/{id}', 'DeleteCarousel')->name('delete.carousel');
 });

   //course controller
Route::controller(CourseController::class)->group(function () {
    Route::get('/all/course', 'AllCourse')->name('all.course');
    Route::get('/add/course', 'AddCourse')->name('add.course');
    Route::post('/store/course', 'StoreCourse')->name('store.course');
    Route::get('/edit/course/{id}', 'EditCourse')->name('edit.course');
    Route::post('/update/course', 'UpdateCourse')->name('update.course');
    Route::get('/delete/course/{id}', 'DeleteCourse')->name('delete.course');
});

//testimonial controller
Route::controller(TestimonialController::class)->group(function () {
    Route::get('/all/testimonial', 'allTestimonial')->name('all.testimonial');
    
      Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
      Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
      Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
      Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
       Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
 });

 //categorie controller
Route::controller(CategorieController::class)->group(function () {
    Route::get('/all/categorie', 'allCategorie')->name('all.categorie');
    
      Route::get('/add/categorie', 'AddCategorie')->name('add.categorie');
      Route::post('/store/categorie', 'StoreCategorie')->name('store.categorie');
      Route::get('/edit/categorie/{id}', 'EditCategorie')->name('edit.categorie');
      Route::post('/update/categorie', 'UpdateCategorie')->name('update.categorie');
       Route::get('/delete/categorie/{id}', 'DeleteCategorie')->name('delete.categorie');
 });
    
}); 


Route::middleware('auth','role:user')->group(function () 
{
    
    //Route::get('/user/login', [AdminController::class, 'showLoginForm'])->name('l');
    Route::any('startquiz/dashboard',[QuestionController::class,'startquiz'])->name('startquiz');
    Route::any('/submitans/dashboard',[QuestionController::class,'submitans'])->name('submit'); 
    Route::get('/logout',[UserController::class,'destroy'])->name('user.logout');   
    Route::get('/dashboard',[UserController::class,'UserDashboard'])->name('start');   
    
   // Route::any('/dashboard',[AdminController::class,'dashboard'])->name('user');

   Route::get('/user/profile', [UserController::class,'UserProfile'])->name('user.profile');
   Route::post('/store/userprofile',[UserController::class,'StoreProfile'])->name('store.user_profile');
   Route::get('/edit/userprofile',[UserController::class,'EditProfile'])->name('edit.user_profile');
   Route::post('/update/userpassword',[UserController::class,'UpdatePassword'])->name('update.userpassword');
   Route::get('/edit/userpassword',[UserController::class,'ChangePassword'])->name('change.userpassword');
   Route::get('/user/courses',[UserController::class,'UserCourses'])->name('user_courses');
   Route::get('/delete/result/{id}',[ResultController::class,'DeleteResult'])->name('delete_result');
    Route::get('/user/result',[ResultController::class,'ShowResult'])->name('show_result');
  
});

Route::get('/courses',[UserController::class,'MasterCourses'])->name('master_courses');    

Route::get('/user/courses',[UserController::class,'UserCourses'])->name('user_courses');

