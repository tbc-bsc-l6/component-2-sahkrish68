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
         @foreach ($rooms as $room)
         <div class="col-md-4 col-sm-6">
            <div id="serv_hover" class="room">
               <div class="room_img">
                  <figure><img src="{{ asset('room/' . $room->image) }}" alt="{{ $room->room_title }}" /></figure>
               </div>
               <div class="bed_room">
                  <h3>{{ $room->room_title }}</h3>
                  <p>{{ \Illuminate\Support\Str::limit($room->description, 100, '...') }}</p>
                  <p><strong>Price:</strong> ${{ $room->price }}</p>
                  <p><strong>Type:</strong> {{ ucfirst($room->room_type) }}</p>
                  <p><strong>Free Wifi:</strong> {{ ucfirst($room->wifi) }}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>