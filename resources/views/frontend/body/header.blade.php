   <!-- Navbar Start -->
   <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

 
    <div class="collapse navbar-collapse" id="navbarCollapse">
        @if (Route::has('login'))
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/dashboard" class="nav-item nav-link active">Home</a>
           
            <a href="{{ route('user_courses') }}" class="nav-item nav-link">Courses</a>
            @auth
            <a href="{{ url('/dashboard') }}" class="nav-item nav-link active">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="nav-item nav-link">login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            @endif
            @endauth
           
        </div>
        @endif    
        <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Quiz<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>