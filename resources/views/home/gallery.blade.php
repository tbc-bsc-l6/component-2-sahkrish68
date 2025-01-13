
<style>
   .gallery {
    padding: 50px 0;
    background-color: #f9f9f9;
}

.gallery_img {
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
}

.gallery_img img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
}

.gallery_img:hover img {
    transform: scale(1.05);
}
</style>

<div class="gallery">
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="titlepage">
                   <h2>Gallery</h2>
               </div>
           </div>
       </div>
       <div class="row">
           <!-- Check if there are any images -->
           @if(App\Models\Gallary::count() > 0)
               @foreach(App\Models\Gallary::all() as $image)
                   <div class="col-md-3 col-sm-6">
                       <div class="gallery_img">
                           <figure>
                               <img src="{{ asset('mygallary/' . $image->image) }}" alt="Gallery Image" class="img-fluid"/>
                           </figure>
                       </div>
                   </div>
               @endforeach
           @else
               <div class="col-12">
                   <p>No images available in the gallery.</p>
               </div>
           @endif
       </div>
   </div>
</div>