@extends('adminbackend.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Service Page </h4>

            <form method="post" action="{{ route('store.testimonial') }}" enctype="multipart/form-data">
                @csrf
               

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Testimonial_Image</label>
                <div class="col-sm-10">
                    <input name="testimonial_image" class="form-control" type="file" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Client_Name</label>
                <div class="col-sm-10">
                    <input name="client_name" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Profession</label>
                <div class="col-sm-10">
                    <input name="profession" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input name="description" class="form-control" type="text"  id="example-text-input">
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