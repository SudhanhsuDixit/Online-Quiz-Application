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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description_One</th>
                                        <th>Description_Two</th>
                                        <th>Link_One</th>
                                        <th>Link_Two</th>
                                        <th>Link_Three</th>
                                        <th>Link_Four</th>
                                        <th>Link_Five</th>
                                        <th>Link_Six</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($about as $serve)
                                    <tr>
                                      <th scope="row">{{ $loop->index +1}}</th>
                                      <td>
                                        {{$serve->about_image}}
                                      </td>
                                      <td>{{$serve->title}}</td>
                                      <td>{{$serve->description_one}}</td>
                                      <td>{{$serve->description_two}}</td>
                                      <td>{{$serve->link_one}}</td>
                                      <td>{{$serve->link_two}}</td>
                                      <td>{{$serve->link_three}}</td>
                                      <td>{{$serve->link_four}}</td>
                                      <td>{{$serve->link_five}}</td>
                                      <td>{{$serve->link_six}}</td>
                                      <td>
                                        <a href="{{route('add.about')}}" class="btn btn-primary btn-sm ">Add</a>
                                        <a href="{{route('edit.about',$serve->id)}}" class="btn btn-info waves-effect waves-light" value="Save Changes" type="submit">Edit</a>
                                      
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

