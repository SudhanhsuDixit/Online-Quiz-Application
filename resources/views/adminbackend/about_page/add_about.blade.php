@extends('adminbackend.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Service Page </h4>

            <form method="post" action="{{ route('store.about') }}" enctype="multipart/form-data">
                @csrf
               

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">About_Image</label>
                <div class="col-sm-10">
                    <input name="about_image" class="form-control" type="file" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description_One</label>
                <div class="col-sm-10">
                    <input name="description_one" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description_Two</label>
                <div class="col-sm-10">
                    <input name="description_two" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Link_One</label>
                <div class="col-sm-10">
                    <input name="link_one" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Link_Two</label>
                <div class="col-sm-10">
                    <input name="link_two" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Link_Three</label>
                <div class="col-sm-10">
                    <input name="link_three" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Link_Four</label>
                <div class="col-sm-10">
                    <input name="link_four" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Link_Five</label>
                <div class="col-sm-10">
                    <input name="link_five" class="form-control" type="text"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Link_Six</label>
                <div class="col-sm-10">
                    <input name="link_six" class="form-control" type="text"  id="example-text-input">
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