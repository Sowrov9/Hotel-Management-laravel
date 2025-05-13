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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

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
                        <a class="nav-link active text-white" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Gallery</a>
                    </li>
                    @if (Session::has('customerlogin'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('logout') }}">LogOut</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href="{{ url('booking') }}"
                                style="background-color: #292b29; color:white">Booking</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('login') }}">LogIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href="{{url('login')}}"
                                style="background-color: #292b29; color:white">Booking</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
