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

    <!-- Include main body content -->
      @include('admin.body')  
       <!-- Include admin footer section -->
        @include('admin.footer') 
  </body>
</html>