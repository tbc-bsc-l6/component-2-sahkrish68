<!-- Header Section -->
<div class="header">
   <div class="container">
      <div class="row">
         <!-- Logo Section -->
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 logo_section">
            <div class="full">
               <div class="center-desk">
                  <div class="logo">
                     <a href="{{ url('/') }}"><img src="images/logo.png" alt="Logo" /></a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Navigation Section -->
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="navigation navbar navbar-expand-md navbar-dark">
               <!-- Navbar Toggler -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <!-- Navbar Links -->
               <div class="collapse navbar-collapse" id="navbarContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                     </li>
                     
                     <li class="nav-item ">
                        <a class="nav-link" href="{{url('/')}}">Our Room</a>
                     </li>
                     <li class="nav-item ">
                        <a class="nav-link" href="">Gallery</a>
                     </li>
                    
                     <li class="nav-item ">
                        <a class="nav-link" href="">Contact Us</a>
                     </li>
                     <!-- Authentication Links -->
                     @if (Route::has('login'))
                        @auth
                           <!-- User is Logged In -->
                           <li class="nav-item dropdown">
                              <a 
                                 class="nav-link dropdown-toggle" 
                                 href="#" 
                                 id="userDropdown" 
                                 role="button" 
                                 data-toggle="dropdown" 
                                 aria-haspopup="true" 
                                 aria-expanded="false" 
                                 style="font-weight: bold; color: #070606; font-style: italic; text-shadow: 1px 1px 2px #888;"
                              >
                                 <i class="fas fa-user-circle" style="margin-right: 5px;"></i>
                                 {{ Auth::user()->name }}
                              </a>
                              <div class="dropdown-menu" aria-labelledby="userDropdown">
                                 
                                 <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                 </form>
                              </div>
                           </li>
                        @else
                           <!-- Guest User -->
                           <li class="nav-item">
                              <a class="btn btn-success mr-2" href="{{ route('login') }}">Login</a>
                           </li>
                           @if (Route::has('register'))
                           <li class="nav-item">
                              <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                           </li>
                           @endif
                        @endauth
                     @endif
                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>

<!-- CSS for Hover Effects -->
<style>
   /* Hover effect for user's name */
   #userDropdown:hover {
      color: #FF5722 !important;
      text-decoration: underline;
   }
</style>

<!-- Include FontAwesome for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">