@extends('adminbackend.admin_master')
@section('admin')



<div class="container"> 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Testimonial Information</h2>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>I.D</th>
                                        <th>Client_Name</th>
                                        <th>Profession</th>
                                        <th>Description</th>
                                        <th>Testimonial_Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonial as $serve)
                                    <tr>
                                      <th scope="row">{{ $loop->index +1}}</th>
                                      <td>{{$serve->client_name}}</td>
                                      <td>{{$serve->profession}}</td>
                                      <td>{{$serve->description}}</td>
                                      <td>
                                        
                                        {{$serve->testimonial_image}}
                                       
                                        
                                      </td>
                                      <td>
                                        <a href="{{route('add.testimonial')}}" class="btn btn-primary btn-sm ">Add</a>
                                        <a href="{{route('edit.testimonial',$serve->id)}}" class="btn btn-info waves-effect waves-light" value="Save Changes" type="submit">Edit</a>
                                        <a href="{{route('delete.testimonial',$serve->id)}}" class="btn btn-danger waves-effect waves-light" value="Save Changes" type="submit">Delete</a>
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

