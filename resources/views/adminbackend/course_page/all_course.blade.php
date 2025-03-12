@extends('adminbackend.admin_master')
@section('admin')



<div class="container"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Services Information</h2>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>I.D</th>
                                        <th>Read_More</th>
                                        <th>Join_Now</th>
                                        <th>Course_Price</th>
                                        <th>Course_Title</th>
                                        <th>Course_Name</th>
                                        <th>Course_Time</th>
                                        <th>Course_Students</th>
                                        <th>Course_Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($course as $serve)
                                    <tr>
                                      <th scope="row">{{ $loop->index +1}}</th>
                                      <td>{{$serve->read_more}}</td>
                                      <td>{{$serve->join_now}}</td>
                                      <td>{{$serve->course_price}}</td>
                                      <td>{{$serve->course_title}}</td>
                                      <td>{{$serve->course_name}}</td>
                                      <td>{{$serve->course_time}}</td>
                                      <td>{{$serve->course_students}}</td>
                                      <td>{{$serve->course_image}}</td>
                                      <td>
                                        <a href="{{route('add.course')}}" class="btn btn-primary btn-sm ">Add</a>
                                        <a href="{{route('edit.course',$serve->id)}}" class="btn btn-info waves-effect waves-light" value="Save Changes" type="submit">Edit</a>
                                        <a href="{{route('delete.course',$serve->id)}}" class="btn btn-danger waves-effect waves-light" value="Save Changes" type="submit">Delete</a>
                                      </td>
                                    </tr>
                                    @endforeach
                                   
                                  </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection 

