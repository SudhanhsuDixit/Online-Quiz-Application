@php
    $about = App\Models\about::orderBy('title','ASC')->limit(10)->get();
@endphp

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            @foreach($about as $serve)
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{$serve->about_image}}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">{{$serve->title}}</h1>
                <p class="mb-4">{{$serve->description_one}}</p>
                <p class="mb-4">{{$serve->description_two}}</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$serve->link_one}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$serve->link_two}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$serve->link_three}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$serve->link_four}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$serve->link_five}}</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$serve->link_six}}</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
            </div>
            @endforeach   
        </div>
    </div>
</div>