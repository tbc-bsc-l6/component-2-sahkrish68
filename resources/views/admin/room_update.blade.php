<!DOCTYPE html>
<html>
  <head> 
     <!-- Include admin CSS files -->
     <base href="/public">
    @include('admin.css') 
    <style>
        label {
           display: inline-block;
           width: 200px;
        }
        .div_deg {
            padding-top: 30px;
        }
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .image-preview {
            margin-top: 10px;
            max-width: 300px;
            height: auto;
            display: block;
            margin-left: 200px; /* Align with labels */
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
                <h1 style="font-size:30px; font-weight:bold">Update Room</h1>
                <form action="{{ url('update_room', $data->id) }}" method="post" enctype="multipart/form-data">
                     @csrf
                    <div class="div_deg">
                        <label>Room Title</label>
                        <input type="text" name="title" value="{{ $data->room_title }}">
                    </div>

                    <div class="div_deg">
                        <label>Description</label>
                        <textarea name="description">{{ $data->description }}</textarea>
                    </div>

                    <div class="div_deg">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ $data->price }}">
                    </div>

                    <div class="div_deg">
                        <label>Room Type</label>
                        <select name="type">
                            <option selected value="{{ $data->room_type }}">{{ ucfirst($data->room_type) }}</option>
                            <option value="regular">Regular</option>
                            <option value="premium">Premium</option>
                            <option value="delux">Delux</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Free Wifi</label>
                        <select name="wifi">
                            <option selected value="{{ $data->wifi }}">{{ ucfirst($data->wifi) }}</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label>Selected Image</label>
                        <img 
                            src="{{ asset('room/' . $data->image) }}" 
                            alt="Selected Room Image" 
                            class="image-preview"
                        >
                    </div>

                    <div class="div_deg">
                        <label>Upload New Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Update Room">
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