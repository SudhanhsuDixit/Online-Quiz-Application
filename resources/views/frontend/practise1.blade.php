@if (Route::has('login'))
<div class="navbar-nav ms-auto p-4 p-lg-0">
    <a href="/" class="nav-item nav-link active">Home</a>
   
    <a href="{{ route('master_courses') }}" class="nav-item nav-link">Courses</a>
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





@if (Route::has('login'))
<div class="navbar-nav ms-auto p-4 p-lg-0">
    <a href="/" class="nav-item nav-link active">Home</a>
   
    <a href="{{ route('master_courses') }}" class="nav-item nav-link">Courses</a>
    @auth
   
 
    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
    @endif
    @endauth
   
</div>
@endif    