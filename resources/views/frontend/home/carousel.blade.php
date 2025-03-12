@php
    $carousel = App\Models\Carousel::orderBy('title','ASC')->limit(10)->get();
@endphp

<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">

        @foreach($carousel as $serve)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{$serve->carousel_image}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{$serve->title}}</h5>
                            <h1 class="display-3 text-white animated slideInDown">{{$serve->sub_title}}</h1>
                            <p class="fs-5 text-white mb-4 pb-2">{{$serve->description}}</p>
                           
                            
                            <a href="{{route('startquiz')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Start Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach   

    </div>
</div>