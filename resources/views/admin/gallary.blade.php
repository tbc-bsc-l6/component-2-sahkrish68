<!DOCTYPE html>
<html>
  <head> 
     <!-- Include admin CSS files -->
    @include('admin.css') 
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
            <center>

                <h1 style="font-size: 40px; font-weight: bolder; color:white">Gallary</h1>
                <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                    <label for="">Upload Image</label>
                    <input type="file" name="image">
                    </div>
                    

                    <div>
                        <input type="Submit" value="Add Image">
                    </div>
                   
                </form>

            </center>

            






          </div>
        </div>
      </div>
      

    
        @include('admin.footer') 
  </body>
</html>