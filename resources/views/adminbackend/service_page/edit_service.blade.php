@extends('adminbackend.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Service Update Page </h4>

            <form method="post" action="{{route('update.service')}}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $service->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text" value="{{ $service->title }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input name="description" class="form-control" type="text" value="{{ $service->description }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Service Image</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="file" value="{{ $service->service_image }}"  id="example-text-input">
                </div>
            </div>

            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update About Page">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>




@endsection 