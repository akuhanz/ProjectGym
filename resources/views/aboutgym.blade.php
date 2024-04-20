<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard By rehanz</title>

    {{-- BOOTSTRAP CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    {{-- Link file CSS --}}
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">

</head>
<body>

     {{-- Navbar --}}
     <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="#"><img src="https://cdn-sdotid.adg.id/images/37d92b52-78e4-465f-87d2-4cac0f9476af_564x564.webp.jpeg" alt="" style="width: 35px; border-radius: 50%;"></a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="https://cdn-sdotid.adg.id/images/37d92b52-78e4-465f-87d2-4cac0f9476af_564x564.webp.jpeg" alt="" style="width: 35px; border-radius: 50%;"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link mx-lg-2 active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="{{ route('aboutgym') }}">about</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="{{ route('paketgym') }}">Daftar Paket</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="{{ route('produkgym') }}">Produk Gym</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="#">contact</a>
                  </li>
              </ul> 
            </div>
          </div>
          @if(session('authenticated'))
          <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            @else
                <a href="{{ route('admin') }}" class="btn btn-warning">Admin</a>
                <a href="{{ route('login') }}" class="login-bottom">Login</a>
            @endif
          <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    {{-- End Navbar --}}

    {{-- Slider --}}
    <div class="slider">
        <div class="list">
            <div class="item active">
                <img src="{{ asset('storage/images/slide1.png') }}" alt="">
                <div class="content">
                    <p>Design</p>
                    <h2>Slider 01</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam odio id deserunt corrupti eligendi, omnis magni aliquam ea est minus aperiam voluptatem sunt distinctio eaque, amet dolorem corporis, itaque deleniti.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/images/slide2.png') }}" alt="">
                <div class="content">
                    <p>Design</p>
                    <h2>Slider 02</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam odio id deserunt corrupti eligendi, omnis magni aliquam ea est minus aperiam voluptatem sunt distinctio eaque, amet dolorem corporis, itaque deleniti.</p>
                </div>
            </div>
            <div class="item">
                <img src="https://images.pexels.com/photos/5498976/pexels-photo-5498976.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="content">
                    <p>Design</p>
                    <h2>Slider 03</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam odio id deserunt corrupti eligendi, omnis magni aliquam ea est minus aperiam voluptatem sunt distinctio eaque, amet dolorem corporis, itaque deleniti.</p>
                </div>
            </div>
            <div class="item">
                <img src="https://images.pexels.com/photos/10698437/pexels-photo-10698437.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="content">
                    <p>Design</p>
                    <h2>Slider 04</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam odio id deserunt corrupti eligendi, omnis magni aliquam ea est minus aperiam voluptatem sunt distinctio eaque, amet dolorem corporis, itaque deleniti.</p>
                </div>
            </div>
        </div>
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>

        <div class="thumbnail">
            <div class="item active">
                <img src="{{ asset('storage/images/slide1.png') }}" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/images/slide2.png') }}" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="https://images.pexels.com/photos/5498976/pexels-photo-5498976.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="https://images.pexels.com/photos/10698437/pexels-photo-10698437.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
        </div>
    </div>



     <!-- Sertakan file JavaScript -->
     <script src="{{ asset('js/app.js') }}"></script>
      {{-- Bootstrap script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>