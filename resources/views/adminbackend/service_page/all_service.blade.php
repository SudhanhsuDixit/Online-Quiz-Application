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
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($service as $serve)
                                    <tr>
                                      <th scope="row">{{ $loop->index +1}}</th>
                                      <td>{{$serve->title}}</td>
                                      <td>{{$serve->description}}</td>
                                      <td>
                                        
                                        {{$serve->service_image}}
                                       
                                        
                                      </td>
                                      <td>
                                        <a href="{{route('add.service')}}" class="btn btn-primary btn-sm ">Add</a>
                                        <a href="{{route('edit.service',$serve->id)}}" class="btn btn-info waves-effect waves-light" value="Save Changes" type="submit">Edit</a>
                                        <a href="{{route('delete.service',$serve->id)}}" class="btn btn-danger waves-effect waves-light" value="Save Changes" type="submit">Delete</a>
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

