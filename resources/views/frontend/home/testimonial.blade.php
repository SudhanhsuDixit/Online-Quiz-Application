@php
    $testimonial = App\Models\Testimonial::orderBy('client_name', 'ASC')->limit(10)->get();
@endphp



<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Students Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">

            @foreach($testimonial as $serve)
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="{{$serve->testimonial_image}}" style="width: 80px; height: 80px;">
                <h5 class="mb-0">{{$serve->client_name}}</</h5>
                <p>{{$serve->profession}}</</p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0">{{$serve->description}}</</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>