@extends('adminbackend.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Service Page </h4>

            <form method="post" action="{{ route('update.course') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $course->id }}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course Image</label>
                <div class="col-sm-10">
                    <input name="course_image" class="form-control" type="file" value="{{ $course->course_image }}" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Read_more</label>
                <div class="col-sm-10">
                    <input name="read_more" class="form-control" type="text" value="{{ $course->read_more }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Join_Now</label>
                <div class="col-sm-10">
                    <input name="join_now" class="form-control" type="text" value="{{ $course->join_now }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course_Price</label>
                <div class="col-sm-10">
                    <input name="course_price" class="form-control" type="text"  value="{{ $course->course_price }}" id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course_Title</label>
                <div class="col-sm-10">
                    <input name="course_title" class="form-control" type="text" value="{{ $course->course_title }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course_Name</label>
                <div class="col-sm-10">
                    <input name="course_name" class="form-control" type="text" value="{{ $course->course_name }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course_Time</label>
                <div class="col-sm-10">
                    <input name="course_time" class="form-control" type="text" value="{{ $course->course_time }}"  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Course_Students</label>
                <div class="col-sm-10">
                    <input name="course_students" class="form-control" type="text" value="{{ $course->course_students }} id="example-text-input">
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