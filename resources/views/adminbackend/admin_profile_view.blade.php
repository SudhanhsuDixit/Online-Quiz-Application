@extends('adminbackend.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

            
<div class="row">
    <div class="col-lg-12">
        <div class="card"><br><br>

            <center>        
                <img class="round-circle avatar-xl" src="{{ (!empty($adminData->photo))?  url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Card image cap">
            </center>   
   
        <div class="card-body">
            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
            <hr>
            <h4 class="card-title">User Email: {{ $adminData->email }}</h4>
            <hr>
           
            
            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
            </div>
</div>
</div>
        
</div>                     


</div>
</div>

@if(session()->has('success'))
    <script type="text/javascript">
        $(function () {
            swal("Deleted!", "Data has been Deleted.", "success"),
                swal({
                    title: {{ session()->get('success') }},
                    text: "Your Custom or Dynamic SUccess message put here",
                    type: "success"})

        });
    </script>
@endif

@endsection