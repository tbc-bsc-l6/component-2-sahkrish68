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
    </style>
</head>
<body>
    <!-- Include admin header section -->
    <header class="header">
        @include('admin.header')  
    </header>

    <!-- Include admin slider section -->
    @include('admin.slider') 

    <!-- Page Content -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <table class="table_deg">
                    <tr>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Update</th>
                    </tr>

                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->room_title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 100, '...') }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ ucfirst($item->wifi) }}</td>
                        <td>{{ ucfirst($item->room_type) }}</td>
                        <td>
                            <img src="{{ asset('room/' . $item->image) }}" alt="Room Image">
                        </td>
                        <td>
                            <a onclick="return confirm('Do You Want To Delete This ?');" class="btn btn-danger" href="{{url('room_delete',$item->id)}}">Delete</a>
                        </td>
                        <td>
                            <a  class="btn btn-warning" href="{{url('room_update',$item->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Include admin footer section -->
    @include('admin.footer') 
</body>
</html>