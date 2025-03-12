
<link href="{{ asset('files/bootstrap.min.css" rel="stylesheet') }}" type="text/css">

<link href="{{ asset('files/my.css') }}" rel="stylesheet" type="text/css">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        </ul>
        <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button  class="dropdown-item">
                                    <a href="auth-logout-2.html">
                                    <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                    logout</button>
                                </a>            
                                </form>

</div>

</nav>

<div class="container-fluid">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
    <img src="images/onlineexam.jpg" />
        <div class="col-md-5">
        </div>
        <div class="col-md-6">
            <label >Correct:<small>{{ Session::get('correctans') }}</small></label><br>
            <label>In-Correct:<small>{{ Session::get('wrongans') }}</small></label><br>
            <label>Result:<small>{{ Session::get('correctans') }}/{{ Session::get('correctans')+Session::get('wrongans') }}</small></label><br>
            <br>
            <a href="/end/dashboard"><button class="btn btn-primary" style="margin-left:10%">Finish Quiz</button></a>
      
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</div>

<script src="{{ asset('files/jquery.min.js') }}"></script>
<script src="{{ asset('files/popperjs.min.js') }}"></script>
<script src="{{ asset('files/bootstrap.min.js') }}"></script>
