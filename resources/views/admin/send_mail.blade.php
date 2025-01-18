<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    <!-- Include admin CSS files -->
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
    @include('admin.css') 
  </head>
  <body>
    <!-- Include admin header section -->
    <header class="header">
        @include('admin.header')  
    </header>
    
    <!-- Include admin slider section -->
    @include('admin.slider') 

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <center>
            <h1 style="font-size: 30px; font-weight: bold;">Mail sent to {{ $data->name }}</h1>
         

          <!-- Form to send email -->
          <form action="{{url('mail',$data->id)}}" method="post">
            @csrf
           <div class="div_deg">
               <label>Greeting</label>
               <input type="text" name="greeting">
           </div>

           <div class="div_deg">
               <label>Mail Body</label>
               <textarea name="body"></textarea>
           </div>

           <div class="div_deg">
               <label>Action Text</label>
               <input type="text" name="Action_text">
           </div>

           <div class="div_deg">
            <label>Action Url</label>
            <input type="text" name="Action_url">
           </div>


           <div class="div_deg">
            <label> End Line</label>
            <input type="text" name="endline">
           </div>

        
           <div class="div_deg">
               <input class="btn btn-primary" type="submit" value="Send Mail">
           </div>


       </form>
    </center>
        </div>
      </div>
    </div>

    @include('admin.footer') 
  </body>
</html>