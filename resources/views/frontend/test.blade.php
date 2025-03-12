<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quizo HTML Template - V.19</title>
   <!-- FontAwesome-cdn include -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- Google fonts include -->
   <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
   <!-- Bootstrap-css include -->
   <link rel="stylesheet" href="{{ asset('./assetsquiz/css/bootstrap.min.css') }}">
   <!-- Animate-css include -->
   <link rel="stylesheet" href="{{ asset('./assetsquiz/css/animate.min.css') }}">
   <!-- Main-StyleSheet include -->
   <link rel="stylesheet" href="{{ asset('./assetsquiz/css/style.css') }}">
</head>

<body>
   <div class="wrapper position-relative">
      <div class="container-fluid">
         <div class="logo_area ps-5 pt-5">
            <a href="index.html">
               <img src="{{ asset('./assetsquiz/images/logo/logo.png') }}" alt="image_not_found">
            </a>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-8 m-auto">
               <form class="multisteps_form" id="wizard" method="POST" action="{{route('submit')}}">
                  @csrf

                  <!--------------- Step-1 -------------->
                  <div class="multisteps_form_panel step">
                     <div class="form_content position-relative mt-5">
                        <div class="audio_content pb-5 d-flex align-items-center">
                          
                           <div class="audio_title">
                              <h1 class="ps-3">{{ Session::get("nextq") }} {{ Session::get("questions")[Session::get("nextq") - 1]->question }}</h1>
                           </div>
                        </div>
                        <div class="content_box bg-white mt-1">
                       
                           <div class="form_items ps-5 pt-4">
                              <label for="opt_1" class="step_1 position-relative animate__animated animate__fadeInRight animate_25ms active">
                                 {{ Session::get("questions")[Session::get("nextq") - 1]->a }}
                                 <input id="opt_1" type="radio" name="ans" value="a" checked>
                              </label>
                              <label for="opt_2" class="step_1 position-relative animate__animated animate__fadeInRight animate_50ms mt-3">
                                 {{ Session::get("questions")[Session::get("nextq") - 1]->b }}
                                 <input id="opt_2" type="radio" name="ans" value="b">
                              </label>
                              <label for="opt_3" class="step_1 position-relative animate__animated animate__fadeInRight animate_100ms mt-3">
                                 {{ Session::get("questions")[Session::get("nextq") - 1]->c }}
                                 <input id="opt_3" type="radio" name="ans" value="c">
                              </label>
                              <label for="opt_4" class="step_1 position-relative animate__animated animate__fadeInRight animate_100ms mt-3">
                                 {{ Session::get("questions")[Session::get("nextq") - 1]->d }}
                                 <input id="opt_4" type="radio" name="ans" value="d">
                              </label>
                              
                              <input value="{{ Session::get("questions")[Session::get("nextq") - 1]->ans }}" style="visibility:hidden;" name="dbans">
                           </div>
                        </div>
                     </div>
                  </div>

                
                 
                  <!-- Form-Button -->
                 
                  <button type="submit" class="f_btn next_btn border-0 text-white position-absolute" id="nextBtn"
                  onclick="nextPrev(1)">nextq
               </button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- jQuery-js include -->
<script src="{{ asset('./assetsquiz/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap-js include -->
<script src="{{ asset('./assetsquiz/js/bootstrap.min.js') }}"></script>
<!-- jQuery-validate-js include -->
<script src="{{ asset('./assetsquiz/js/jquery.validate.min.js') }}"></script>
<!-- Custom-js include -->
<script src="{{ asset('./assetsquiz/js/script.js') }}"></script>
</body>

</html>