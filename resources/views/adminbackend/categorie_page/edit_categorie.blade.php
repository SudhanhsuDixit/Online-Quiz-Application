@extends('adminbackend.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Categorie Page </h4>

            <form method="post" action="{{ route('update.categorie') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="id" value="{{ $categorie->id }}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Categorie_Image</label>
                <div class="col-sm-10">
                    <input name="categorie_image" class="form-control" type="file" value="{{ $categorie->categorie_image }}" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text"  value="{{ $categorie->title }}" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Col_Name</label>
                <div class="col-sm-10">
                    <input name="col_name" class="form-control" type="text" value="{{ $categorie->col_name }}" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course_No</label>
                <div class="col-sm-10">
                    <input name="course_no" class="form-control" type="text" value="{{ $categorie->course_no }}" id="example-text-input">
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