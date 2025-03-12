<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Online Exam - V.1</title>
   <!-- FontAwesome-cdn include -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- Google fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&display=swap" rel="stylesheet">
   <!-- Bootstrap-css include -->
   <link rel="stylesheet" href="{{ asset('./assets1/css/bootstrap.min.css') }}">
   <!-- Animate-css include -->
   <link rel="stylesheet" href="{{ asset('./assets1/css/animate.min.css') }}">
   <!-- Main-StyleSheet include -->
   <link rel="stylesheet" href="{{ asset('./assets1/css/style.css') }}">
</head>
<body>

   <div class="wrapper position-relative">
      <div class="container-fluid px-5">
         <div class="step_bar_content ps-5 pt-5">
            <h5 class="text-white text-uppercase d-inline-block">Quiz Questions and Answers</h5>
         </div>
         <div class="progress_bar steps_bar mt-3 ps-5 d-inline-block">
            <div class="step rounded-pill d-inline-block text-center position-relative active current">1</div>
            <div class="step rounded-pill d-inline-block text-center position-relative">2</div>
            <div class="step rounded-pill d-inline-block text-center position-relative">3</div>
            <div class="step rounded-pill d-inline-block text-center position-relative">4</div>
         </div>
         <form class="multisteps_form position-relative" id="wizard" method="POST" action="/submitans/dashboard">
            <!------------------------- Step-1 ----------------------------->

            @csrf
            <div class="multisteps_form_panel active" data-animation="slideVert">
               <div class="form_content">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="form_title ps-5">
                           <h1 class="text-white">{{ Session::get("nextq") }} {{ Session::get("questions")[Session::get("nextq") - 1]->question }}</h1>
                        </div>
                     </div>
                     <div class="col-lg-4 text-center">
                        <div class="form_img">
                           <img src="{{ asset('./assets1/images/bg_1.png') }}" alt="image_not_found">
                        </div>
                     </div>
                     <div class="col-lg-4 text-end">
                        <div class="form_items radio-list">
                           <ul class="text-uppercase list-unstyled">
                              <li>
                                 <label for="opt_1" class="step_1 rounded-pill animate__animated animate__fadeInRight animate_25ms active">
                                    <span class="label-pointer rounded-pill text-center">A</span>
                                    <input type="radio" id="opt_1" name="ans" value="a" checked="true">
                                    <span class="label-content d-inline-block text-center rounded-pill">{{ Session::get("questions")[Session::get("nextq") - 1]->a }}</span>
                                 </label>
                              </li>
                              <li>
                                 <label for="opt_2" class="step_1 rounded-pill  animate__animated animate__fadeInRight animate_50ms">
                                    <span class="label-pointer rounded-pill text-center">B</span>
                                    <input type="radio" id="opt_2" name="ans"   value="b">
                                    <span class="label-content d-inline-block text-center rounded-pill">{{ Session::get("questions")[Session::get("nextq") - 1]->b }}</span>
                                 </label>
                              </li>
                              <li>
                                 <label for="opt_3" class="step_1 rounded-pill animate__animated animate__fadeInRight animate_100ms">
                                    <span class="label-pointer rounded-pill text-center">C</span>
                                    <input type="radio" id="opt_3" name="ans"  value="c" >
                                    <span class="label-content d-inline-block text-center rounded-pill">{{ Session::get("questions")[Session::get("nextq") - 1]->c }}</span>
                                 </label>
                              </li>
                              <li>
                                 <label for="opt_4" class="step_1 animate__animated animate__fadeInRight animate_150ms">
                                    <span class="label-pointer rounded-pill text-center">D</span>
                                    <input type="radio" id="opt_4" name="ans"-  value="d">
                                    <span class="label-content d-inline-block text-center rounded-pill">{{ Session::get("questions")[Session::get("nextq") - 1]->d }}</span>
                                 </label>
                              </li>
                              <li>
                                 <input value="{{ Session::get("questions")[Session::get("nextq") - 1]->ans }}" style="visibility:hidden;" name="dbans">
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!---------- Form Button ---------->
               <div class="form_btn py-5 d-flex justify-content-center align-items-center">
                  <button type="submit" class="js-btn-next f_btn rounded-pill active text-uppercase" id="nextBtn"> Next Question <span><i class="fas fa-arrow-right ps-1"></i></span></button>
               </div>
            </div>


           
            

               <!---------- Form Button ---------->
              
            </div>
         </form>
      </div>
      
   </div>
   <!-- jQuery-js include -->
   <script src="{{ asset('./assets1/js/jquery-3.6.0.min.js') }}"></script>
   <!-- Bootstrap-js include -->
   <script src="{{ asset('././assets1/js/bootstrap.min.js') }}"></script>
   <!-- jQuery-validate-js include -->
   <script src="{{ asset('./assets1/js/jquery.validate.min.js') }}"></script>
   <!-- Custom-js include -->
   <script src="{{ asset('./assets1/js/script.js') }}"></script>sss
</body>
</html>



   