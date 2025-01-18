<!DOCTYPE html>
<html>
  <head> 
     <!-- Include admin CSS files -->
    @include('admin.css') 
    <style>
        .table_deg {
            border-collapse: collapse;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid white; /* White border */
            background-color: transparent; /* Transparent background */
            color: white; /* White text color */
        }

        .table_deg th, .table_deg td {
            border: 1px solid white; /* White border */
            padding: 10px;
        }

        .th_deg {
            background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent background for header */
            font-weight: bold;
        }

        .table_deg tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1); /* Subtle difference for even rows */
        }

        .table_deg tr:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Highlight on hover */
        }

        .table_deg img {
            width: 100px;
            height: auto;
        }

        .status-approved {
            background-color: #4CAF50; /* Green for approved */
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        .status-pending {
            background-color: #FFC107; /* Yellow for pending */
            color: black;
            padding: 5px;
            border-radius: 5px;
        }

        .status-cancelled {
            background-color: #f44336; /* Red for cancelled */
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        .alert {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
        }

        .alert-danger {
            background-color: #f44336;
            color: white;
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

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <!-- Flash messages -->
          @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif

          @if(session('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
          @endif

          <table class="table_deg">
              <tr>
                  <th class="th_deg">Room Id</th>
                  <th class="th_deg">Customer Name</th>
                  <th class="th_deg">Email</th>
                  <th class="th_deg">Phone</th>
                  <th class="th_deg">Arrival Date</th>
                  <th class="th_deg">Leaving Date</th>
                  <th class="th_deg">Room Title</th>
                  <th class="th_deg">Price</th>
                  <th class="th_deg">Image</th>
                  <th class="th_deg">Status</th>
                  <th class="th_deg">Delete</th>
                  <th class="th_deg">Update Status</th>
              </tr>

              @foreach($data as $data)
              <tr>
                  <td>{{$data->room_id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->start_date}}</td>
                  <td>{{$data->end_date}}</td>
                  <td>{{$data->room->room_title}}</td>
                  <td>{{$data->room->price}}</td>
                  <td>
                      <img src="{{ asset('room/' . $data->room->image) }}" alt="Room Image">
                  </td>
                  <td>
                      <span class="
                          {{ $data->status == 'approved' ? 'status-approved' : '' }}
                          {{ $data->status == 'pending' ? 'status-pending' : '' }}
                          {{ $data->status == 'cancelled' ? 'status-cancelled' : '' }}
                      ">
                          {{ ucfirst($data->status) }}
                      </span>
                  </td>
                  <td>
                      <a onclick="return confirm('Do You Want To Delete This?');" class="btn btn-danger" href="{{ url('delete_booking', $data->id) }}">Delete</a>
                  </td>
                  <td>
                      <form action="{{ url('update_booking_status', $data->id) }}" method="POST">
                          @csrf
                          <select name="status" class="btn btn-warning" onchange="this.form.submit()">
                              <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending</option>
                              <option value="approved" {{ $data->status == 'approved' ? 'selected' : '' }}>Approved</option>
                              <option value="cancelled" {{ $data->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                          </select>
                      </form>
                  </td>
              </tr>
              @endforeach
          </table>
        </div>
      </div>
    </div>

    @include('admin.footer') 
  </body>
</html>