<!DOCTYPE html>
<html>
<head> 
    <!-- Include admin CSS files -->
    @include('admin.css') 
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 40px;
            font-weight: bolder;
            color: white;
        }
        form {
            margin-top: 20px;
        }
        label {
            color: white;
            font-weight: bold;
        }
        input[type="file"] {
            margin: 10px 0;
            padding: 5px;
            color: black;
            background-color: #f1f1f1;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .alert-success {
            background-color: #4CAF50;
            color: white;
        }
        .alert-danger {
            background-color: #f44336;
            color: white;
        }
        .gallery {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .gallery-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 200px;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
        }
        .gallery-item button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 0 0 10px 10px;
            cursor: pointer;
            width: 100%;
        }
        .gallery-item button:hover {
            background-color: #d32f2f;
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
                <center>
                    <h1>Gallery</h1>
                    <!-- Flash Messages -->
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

                    <!-- Upload Form -->
                    <form action="{{ url('upload_gallary') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="image">Upload Image:</label>
                            <input type="file" name="image" required>
                        </div>
                        <div>
                            <input type="submit" value="Add Image">
                        </div>
                    </form>

                    <!-- Display Gallery -->
                    <div class="gallery">
                        @foreach(App\Models\Gallary::all() as $image)
                            <div class="gallery-item">
                                <img src="{{ asset('mygallary/' . $image->image) }}" alt="Gallery Image">
                                <form action="{{ url('delete_gallery/' . $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </center>
            </div>
        </div>
    </div>

    @include('admin.footer') 
</body>
</html>