<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sleepy Lounge</title>
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="{{asset('public/vendor/lightbox2-2.11.3/dist/css/lightbox.min.css')}}" /> --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style type="text/css">
        html {
  scroll-behavior: smooth;
}
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container ">
            <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/Hotel_Lounge_Logo.jpg') }}"
                    width="50px" height="50px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link btn btn-success shadow-none" href="#">Booking</a> --}}
                        <a class="nav-link btn btn-success" href="#"
                            style="background-color: #292b29; color:white">Booking</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Slider start --}}
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/slider/one.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/slider/two.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/slider/three.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Slider end --}}

    {{-- Service start --}}
    <div class="container my-4" id="service">
        <h1 class="text-center">Services</h1>
        <hr>
        <div class="row my-4">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/1740547753_images (1).jpg') }}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-8">
                <h3>Virus</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime unde amet totam ipsa in. Cumque
                    molestiae magnam voluptas in praesentium eum architecto totam consequuntur ipsam, iure,
                    exercitationem consequatur ullam nobis?</p>
                <a href="" class="btn btn-primary">Read more</a>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/1740547801_download (3).jpg') }}" alt="..."
                    class="img-thumbnail">
            </div>
            <div class="col-md-8">
                <h3>Service Heading</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime unde amet totam ipsa in. Cumque
                    molestiae magnam voluptas in praesentium eum architecto totam consequuntur ipsam, iure,
                    exercitationem consequatur ullam nobis?</p>
                <a href="" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>

    <div id="gallery" class="container my-4">
        <h1 class="text-center">Gallery</h1>
        <div class="row my-4">
            @foreach ($roomtypes as $roomtype)
                <div class="col-md-4 my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $roomtype->title }}</h5>
                            {{-- @foreach ($roomtype->roomtypeimages as $img) --}}
                                {{-- <a href="{{ asset('storage/images/' . $img->img_src) }}" data-lightbox="rgallery{{$roomtype->id}}"
                                    data-title="{{ $img->title }}">
                                    <img class="img-fluid" src="{{ asset('storage/images/' . $img->img_src) }}" alt="Gallery Image"
                                        width="150">
                                </a> --}}
                                <div id="carouselExampleIndicators{{$roomtype->id}}" class="carousel slide">
                                    {{-- <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators{{$roomtype->id}}" data-bs-slide-to="0" class="active"
                                            aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators{{$roomtype->id}}" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators{{$roomtype->id}}" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    </div> --}}
                                    <div class="carousel-inner">
                                        @foreach ($roomtype->roomtypeimages as $key=>$img)
                                            <div class="carousel-item {{$key == 0 ? 'active': ''}}">
                                                <img src="{{ asset('storage/images/'.$img->img_src) }}" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$roomtype->id}}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$roomtype->id}}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
