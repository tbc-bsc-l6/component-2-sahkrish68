<!DOCTYPE html>
<html lang="en">
   <head>
   <base href="/public">
   @include('home.css')
   <style>
   label
   {
     display: inline-block;
     width: 200px;
   }
   input
   {
     width: 100%;
   }
   </style>
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header --><!--  -->
      <header>
         @include('home.header')
      </header>


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
              <div class="col-md-8 ">
                 <div id="serv_hover" class="room">
                    <div class="room_img">
                       <figure><img src="{{ asset('room/' . $room->image) }}" alt="{{ $room->room_title }}" /></figure>
                    </div>
                    <div class="bed_room">
                       <h2>{{ $room->room_title }}</h2>
                       <p style ="padding: 12px">{{ $room->description }}</p>
                       <h4>Free Wifi : {{ $room->wifi }} </h4>
                       <h4>Room Type: {{ $room->room_type}} </h4>
                       <h3>Price : ${{ $room->price}} </h3>
                    </div>
                 </div>
              </div>
              <div class="col-md-4">
            
               <h1 style="font-size: 40px">Book Your Room</h1>
               @if($errors)

               @foreach ($errors->all() as $errors)

               <li>{{$errors}}</li>

               @endforeach

              @endif

               <form action="{{ url('add_booking/' . $room->id) }}" method="post">
               @csrf


               <div>
                  <label>Name</label>
                  <input type="text" name="name">
               </div>

               <div>
                  <label>Email</label>
                  <input type="email" name="email">
               </div>

               <div>
                  <label>Phone No</label>
                  <input type="number" name="phone">
               </div>

               <div>
                  <label>Start Date</label>
                  <input type="date" name="startDate" id="startDate">
               </div>

               <div>
                  <label>End Date</label>
                  <input type="date" name="endDate" id="endDate">
               </div>

               <div style="padding-top: 20px;">
                  <input type="Submit" class="btn btn-primary" value="Book Room">
               </div>
            </form>

              </div>
           </div>
        </div>
     </div>






      @include('home.footer')

 
      {{-- <script>
         $(function(){
            var dtToday = new Date();
         
            var month = dtToday.getMonth() + 1;

            var day = dtToday.getDate();

            var year = dtToday.getFullYear();

            if(month < 10)
               month = '0' + month.toString();

            if(day < 10)
            day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

         });
      </script> --}}

      <script>
         document.addEventListener("DOMContentLoaded", function () {
            // Get the date input elements
            const startDateInput = document.getElementById("startDate");
            const endDateInput = document.getElementById("endDate");
      
            // Set the minimum date for the inputs
            const today = new Date().toISOString().split("T")[0];
            startDateInput.min = today;
      
            // Add an event listener to set the end date's minimum date based on the start date
            startDateInput.addEventListener("change", function () {
               endDateInput.min = startDateInput.value;
            });
         });
      </script>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>