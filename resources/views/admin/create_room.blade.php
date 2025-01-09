<!DOCTYPE html>
<html>
  <head> 
     <!-- Include admin CSS files -->
    @include('admin.css') 
    <style>
        label
        {
           display: inline-block;
           width: 200px;
        }
        .div_deg
        {
            padding-top: 30px;

        }
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
    </style>
  </head>
  <body>
    <!-- Include admin header section -->
    <header class="header">
        @include('admin.header')  
    </header>
     <!-- Include admin slider section -->
    @include('admin.slider') 
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_center">
                <h1 style="font-size:30px; font-weight:bold">Add Room</h1>
                <form action="{{('add_room')}}" method="post" enctype="multipart/form-data">
                     @csrf
                    <div class="div_deg">
                        <label>Room Tittle</label>
                        <input type="text" name="title">
                    </div>

                    <div class="div_deg">
                        <label>Description</label>
                        <textarea name="description"></textarea>
                    </div>

                    <div class="div_deg">
                        <label>price</label>
                        <input type="number" name="price">
                    </div>

                    <div class="div_deg">
                        <label>Room Type</label>
                        <select name="type">
                            <option selected value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="delux">Delux</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Free Wifi</label>
                        <select name="wifi">
                            <option selected value="yes">yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Upload Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Add Room">
                    </div>


                </form>
            </div>


          </div>
        </div>
      </div>

       <!-- Include admin footer section -->
        @include('admin.footer') 
  </body>
</html>