
@extends('pages.frontend.frontlayout')
@section('content')
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
    {{-- Service end --}}
@endsection
