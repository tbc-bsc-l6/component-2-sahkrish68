<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('home.css')
      <style>
         label {
            display: inline-block;
            width: 200px;
         }
         input {
            width: 100%;
         }
         .error-message {
            color: red;
         }
      </style>
   </head>
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- header -->
      <header>
         @include('home.header')
      </header>
      <!-- room details section -->
      <div class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Lorem Ipsum available, but the majority have suffered</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <div id="serv_hover" class="room">
                     <div class="room_img">
                        <figure>
                           <img src="{{ asset('room/' . $room->image) }}" alt="{{ $room->room_title }}" />
                        </figure>
                     </div>
                     <div class="bed_room">
                        <h2>{{ $room->room_title }}</h2>
                        <p style="padding: 12px">{{ $room->description }}</p>
                        <h4>Free Wifi: {{ $room->wifi ? 'Available' : 'Not Available' }}</h4>
                        <h4>Room Type: {{ $room->room_type }}</h4>
                        <h3>Price: ${{ $room->price }}</h3>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <h1 style="font-size: 40px">Book Your Room</h1>
                  <div>
                     @if(session('success'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session('success') }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endif
                 
                     @if(session('error'))
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                             {{ session('error') }}
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endif
                 
                     @if($errors->any())
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                             <ul>
                                 @foreach($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                     @endif
                 </div>
                  <!-- Validation errors -->
                  @if($errors->any())
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li class="error-message">{{ $error }}</li>
                     @endforeach
                  </ul>
                  @endif
                  <!-- Booking Form -->
                  <form action="{{ url('add_booking/' . $room->id) }}" method="post">
                     @csrf
                     <div>
                        <label>Name</label>
                        <input type="text" name="name" 
                        value="{{ Auth::id() ? Auth::user()->name : '' }}" required>
                     </div>
                     <div>
                        <label>Email</label>
                        <input type="email" name="email" 
                        value="{{ Auth::id() ? Auth::user()->email : '' }}" required>
                     </div>
                     <div>
                        <label>Phone No</label>
                        <input type="number" name="phone" 
                        value="{{ Auth::id() ? Auth::user()->phone : '' }}" required>
                     </div>
                     <div>
                        <label>Start Date</label>
                        <input type="date" name="startDate" id="startDate" required>
                     </div>
                     <div>
                        <label>End Date</label>
                        <input type="date" name="endDate" id="endDate" required>
                     </div>
                     <div style="padding-top: 20px;">
                        <input type="submit" class="btn btn-primary" value="Book Room">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- footer -->
      @include('home.footer')
      <!-- Scripts -->
      <script>
         document.addEventListener("DOMContentLoaded", function () {
            const startDateInput = document.getElementById("startDate");
            const endDateInput = document.getElementById("endDate");
            const today = new Date().toISOString().split("T")[0];
            
            startDateInput.min = today;

            startDateInput.addEventListener("change", function () {
               endDateInput.min = startDateInput.value;
            });
         });
      </script>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>