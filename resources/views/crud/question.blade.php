@extends('adminbackend.admin_master')
<br>
<br>
@section('admin')
<link href="{{ asset('files/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('files/my.css') }}" rel="stylesheet" type="text/css">



<br>
<br>

<br>

<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{$errors}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                   
                @endforeach

                @if(Session::get('successMessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{Session::get('successMessage')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    <?php Session::forget('successMessage'); ?>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-1"><h4>Question</h4></div>
                    
                    <div class="col-sm-7"><Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button></div>
                    
                    <div class="col-sm-4">
                        <div class="search-box">

                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>                   
                    <tr>
                        <th>#</th>
                        <th>Question <i class="fa fa-sort"></i></th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($qs as $qq)

                
                    <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{$qq->question}}</td>
                      

                        <td>
                            <a href="#" class="text-warning"  data-toggle="modal" data-target="#Modal_update{{$qq->id}}">Update</a>
                            <a href="#" class="text-danger"  data-toggle="modal" data-target="#Modal_delete{{$qq->id}}">Delete</a>
                        </td>
                    </tr>




                    <div class="modal fade" id="Modal_delete{{$qq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="post" action="/delete">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
     
        <input style="visiblity:hidden" name="id" value="{{$qq->id}}">
        <h3>Are You Want To Delete this Question?</h3>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" >Delete </button>
      </div>
</div>
</form>
    </div>
  </div>
</div>


                    <!-- Model Update-->
  <div class="modal fade" id="Modal_update{{$qq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="post" action="/update/dashboard">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="row">
          <h5>Question:</h5>
        </div>
        <input style="visiblity:hidden" name="id" value="{{$qq->id}}">
        <div class="row" style="padding-10px">
            <input name="question" value="{{$qq->question}}" class="form-control">
      </div>
        <div class="row">
            <div class="col-md-6"><label>A</label></div>
            <div class="col-md-6"><label>B</label></div>
        </div>
        <div class="row">
            <div class="col-md-6"><input value="{{$qq->a}}" name="opa"></div>
            <div class="col-md-6"><input value="{{$qq->b}}" name="opb"></div>
        </div>
        <div class="row">
            <div class="col-md-6"><label>C</label></div>
            <div class="col-md-6"><label>D</label></div>
        </div>
        <div class="row">
            <div class="col-md-6"><input value="{{$qq->c}}" name="opc"></div>
            <div class="col-md-6"><input value="{{$qq->d}}"name="opd"></div>
        </div>
        <div class="row"><label>Answer:</label>
            <div class="col-md-3" class="form-control">
                <select name="ans">
                    <option value="{{$qq->ans}}">{{$qq->ans}}</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>
            </div>
            <div class="col-md-9"></div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Update Question</button>
      </div>
</form>
    </div>
  </div>
</div>



                    <!-- Modal-Delete -->

  


                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>


<!-- Modal-Add -->
<div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="post" action="/add/dashboard">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <div class="row">
          <h5>Question:</h5>
        </div>
        <div class="row" style="padding-10px">
            <input name="question" class="form-control">
      </div>
        <div class="row">
            <div class="col-md-6"><label>A</label></div>
            <div class="col-md-6"><label>B</label></div>
        </div>
        <div class="row">
            <div class="col-md-6"><input name="opa"></div>
            <div class="col-md-6"><input name="opb"></div>
        </div>
        <div class="row">
            <div class="col-md-6"><label>C</label></div>
            <div class="col-md-6"><label>D</label></div>
        </div>
        <div class="row">
            <div class="col-md-6"><input name="opc"></div>
            <div class="col-md-6"><input name="opd"></div>
        </div>
        <div class="row"><label>Answer:</label>
            <div class="col-md-3" class="form-control">
                <select name="ans">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>
            </div>
            <div class="col-md-9"></div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Add Question</button>
      </div>
</form>
    </div>
  </div>
</div>



<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}"onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
</form>



<script src="files/jquery.min.js"></script>
<script src="files/popperjs.min.js"></script>
<script src="files/bootstrap.min.js"></script>
@endsection