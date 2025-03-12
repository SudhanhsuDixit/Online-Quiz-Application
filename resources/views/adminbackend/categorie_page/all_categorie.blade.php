@extends('adminbackend.admin_master')
@section('admin')



<div class="container"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Categorie Information</h2>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>I.D</th>
                                        <th>Title</th>
                                        <th>Col_Name</th>
                                        <th>Course_No</th>
                                        <th>Categorie_Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorie as $serve)
                                    <tr>
                                      <th scope="row">{{ $loop->index +1}}</th>
                                      <td>{{$serve->title}}</td>
                                      <td>{{$serve->col_name}}</td>
                                      <td>{{$serve->course_no}}</td>
                                      <td>
                                        
                                        {{$serve->categorie_image}}
                                       
                                        
                                      </td>
                                      <td>
                                        <a href="{{route('add.categorie')}}" class="btn btn-primary btn-sm ">Add</a>
                                        <a href="{{route('edit.categorie',$serve->id)}}" class="btn btn-info waves-effect waves-light" value="Save Changes" type="submit">Edit</a>
                                        <a href="{{route('delete.categorie',$serve->id)}}" class="btn btn-danger waves-effect waves-light" value="Save Changes" type="submit">Delete</a>
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

