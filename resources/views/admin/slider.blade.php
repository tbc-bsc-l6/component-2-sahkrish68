
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class=""></div>
        <div class="title">
          <h1 class="h5">Krish Bikram Sah</h1>
          <p>Advance Web Development</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="{{url('/home')}}"> <i class="icon-home"></i>Home </a>
              </li>
              <li>
                <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Hotel Rooms</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('create_room')}}">Add Rooms</a></li>
                  <li><a href="{{url('view_room')}}">View Room</a></li>     
           </ul>
        </li>
        <li>
          <a href="{{url('bookings')}}"> <i class="icon-home"></i>Bookings </a>
        </li>
        <li>
          <a href="{{url('gallary')}}"> <i class="icon-home"></i>Gallary </a>
        </li>
        <li>
          <a href="{{url('all_messages')}}"> <i class="icon-home"></i>Messages </a>
        </li>
    </ul>
    </nav>