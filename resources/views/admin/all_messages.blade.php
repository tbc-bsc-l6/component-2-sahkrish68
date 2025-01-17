<!DOCTYPE html>
<html>
  <head> 
    <!-- Include admin CSS files -->
    @include('admin.css') 
    <style>
      .table_deg {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
      }
      .table_deg th, .table_deg td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }
      .th_deg {
        background-color: #f4f4f4;
        font-weight: bold;
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
      
    <!-- Contact Messages Table -->
    <div class="page-content">
      <div class="container-fluid">
        <div class="page-header">
          <h2>Contact Messages</h2>
        </div>

        @if($contacts->isEmpty())
          <p class="text-center text-muted">No messages found.</p>
        @else
          <table class="table_deg">
            <thead>
              <tr>
                <th class="th_deg">ID</th>
                <th class="th_deg">Name</th>
                <th class="th_deg">Email</th>
                <th class="th_deg">Phone</th>
                <th class="th_deg">Message</th>
                <th class="th_deg">Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach($contacts as $contact)
              <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>

    <!-- Include admin footer section -->
    @include('admin.footer') 
  </body>
</html>