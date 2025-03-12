@extends('adminbackend.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Service Page </h4>

            <form method="post" action="{{route('update.carousel')}}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="id" value="{{ $carousel->id }}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Carousel_Image</label>
                <div class="col-sm-10">
                    <input name="carousel_image" class="form-control"  value="{{ $carousel->carousel_image }}" type="file" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text" value="{{ $carousel->title }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Sub_Title</label>
                <div class="col-sm-10">
                    <input name="sub_title" class="form-control" type="text" value="{{ $carousel->sub_title }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input name="description" class="form-control" type="text" value="{{ $carousel->description }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            


            <input type="submit" class="btn btn-info waves-effect waves-light" >
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>




@endsection 