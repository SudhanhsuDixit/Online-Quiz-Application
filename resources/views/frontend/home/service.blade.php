@php
    $service = App\Models\service::orderBy('title','ASC')->limit(10)->get();
@endphp
    <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($service as $serve)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                        <h5 class="mb-3">{{$serve->title}}</h5>
                        <p>{{$serve->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>