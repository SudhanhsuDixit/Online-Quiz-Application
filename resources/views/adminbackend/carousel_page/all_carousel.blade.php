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
                                        <th>Title</th>
                                        <th>Sub_Title</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carousel as $serve)
                                    <tr>
                                    
                                      <td>{{$loop->$index + 1 }}</td>
                                      <td>{{$serve->title}}</td>
                                      <td>{{$serve->sub_title}}</td>
                                      <td>{{$serve->description}}</td>
                                      <td>
                                        
                                        {{$serve->carousel_image}}
                                       
                                        
                                      </td>
                                      <td>
                                        <a href="{{route('add.carousel')}}" class="btn btn-primary btn-sm ">Add</a>
                                        <a href="{{route('edit.carousel',$serve->id)}}" class="btn btn-info waves-effect waves-light" value="Save Changes" type="submit">Edit</a>
                                        <a href="{{route('delete.carousel',$serve->id)}}" class="btn btn-danger waves-effect waves-light" value="Save Changes" type="submit">Delete</a>
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

