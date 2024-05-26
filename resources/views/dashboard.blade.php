<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard By rehanz</title>

     {{-- TailwindCSS --}}
     @vite('resources/css/app.css')

     <link rel="stylesheet" href="{{ asset('LTE/dist/icon/css/all.min.css')}}">

   
    {{-- Link file CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
  <header class="navbar-fixed -top-1 left-0 w-full flex items-center">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="#home" class="font-bold text-lg text-primary block py-6">hanzyozakura</a>
            </div>
            
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                </button>
                
                <nav id="nav-menu" class="hidden absolute py-5 z-10 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="block lg:flex ">
                        <li class="group">
                            <a href="{{ route('dashboard') }}" id="nav-text" class="text-base text-dark lg:text-white py-2 mx-8 flex  group-hover:text-primary ">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="{{ route('riwayattransaction') }}" id="nav-text" class="text-base text-dark lg:text-white py-2 mx-8 flex group-hover:text-primary ">Transaction</a>
                        </li>
                        <li class="group">
                            <a href="{{ route('shop') }}" id="nav-text" class="text-base text-dark lg:text-white py-2 mx-8 flex group-hover:text-primary ">Shop</a>
                        </li>
                        
                        @auth
                          @if(Auth::user()->role === 'admin')
                              <li class="group">
                                  <a href="{{ route('dashboardadmin')}}"  id="nav-text" class="text-base text-dark lg:text-white py-2 mx-8 flex group-hover:text-primary ">Admin</a>
                              </li>
                          @endif
                        @endauth
                        <li class="group mt-2">
                            @if(session('authenticated'))
                            <a href="{{ route('logout') }}" class="py-2 px-5 mx-5 bg-red-700 rounded-full text-white hover:bg-opacity-70 ease-in-out duration-300">Logout</a>
                            @else
                                <a href="{{ route('login') }}" class="py-2 px-5 mx-5 login-bottom">Login</a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header> 

    <section class="hero-section">
        <div class="container flex items-center justify-center text-white flex-column">
          <div class=" text-center">
            <h1 class="font-bold text-3xl sm:text-7xl">Welcome To Gym</h1>
            <h2 class="font-semibold text-xl sm:text-5xl">My Costumers</h2>
          </div>
        </div>
    </section>


     {{-- Slider --}}
     <div class="slider">
        <div class="list">
            <div class="item active">
                <img src="{{ asset('storage/images/fas1.jpg') }}" alt="">
                <div class="content">
                    <p>Point Pertama</p>
                    <h2>Peralatan Kardio dan Kekuatan Lanjutan</h2>
                    <p>Gym kami dilengkapi dengan teknologi kebugaran terbaru, termasuk treadmill, mesin elliptical, sepeda statis, beban bebas, dan mesin resistensi. Apakah Anda ingin meningkatkan kesehatan kardiovaskular atau membangun otot, berbagai peralatan kami cocok untuk semua tingkat kebugaran dan tujuan.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/images/fas2.jpg') }}" alt="">
                <div class="content">
                    <p>Point Kedua</p>
                    <h2>Studio Khusus untuk Kebugaran Grup</h2>
                    <p>Kami menawarkan berbagai kelas kebugaran grup di studio khusus kami. Nikmati suasana tenang di studio yoga dan Pilates kami, atau lingkungan penuh energi di studio bersepeda dan tari kami. Kelas-kelas kami dirancang untuk membuat Anda tetap termotivasi dan terlibat, membantu Anda mencapai tujuan kebugaran dalam suasana yang menyenangkan dan mendukung.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/images/fas3.jpg') }}" alt="">
                <div class="content">
                    <p>Point Ketiga</p>
                    <h2>Zona Kesehatan dan Pemulihan</h2>
                    <p>Setelah berolahraga berat, santai dan pulihkan diri di zona kesehatan dan pemulihan kami. Fasilitas kami mencakup sauna dan ruang uap untuk membantu Anda detoksifikasi dan bersantai, serta layanan terapi pijat profesional untuk membantu pemulihan otot dan relaksasi. Kami percaya pada pendekatan holistik terhadap kebugaran yang mencakup kesejahteraan fisik dan mental.</p>
                </div>
            </div>
            <div class="item">
                <img src="https://images.pexels.com/photos/10698437/pexels-photo-10698437.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="content">
                    <p>Point Keempat</p>
                    <h2>Fasilitas Tambahan</h2>
                    <p>Untuk meningkatkan pengalaman gym Anda, kami menyediakan berbagai fasilitas tambahan. Ruang loker kami yang luas dilengkapi dengan loker yang aman, pancuran, dan area ganti untuk kenyamanan Anda. Setelah berolahraga, kunjungi bar jus kami untuk menikmati smoothie segar dan camilan sehat untuk mengisi kembali energi Anda. Kami bertujuan menciptakan lingkungan yang nyaman dan nyaman bagi semua anggota kami.</p>
                </div>
            </div>
        </div>
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>

        <div class="thumbnail">
            <div class="item active">
                <img src="{{ asset('storage/images/fas1.jpg') }}" alt="">
                <div class="content">
                    Peralatan Kardio dan Kekuatan Lanjutan
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/images/fas2.jpg') }}" alt="">
                <div class="content">
                    Studio Khusus untuk Kebugaran Grup
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/images/fas3.jpg') }}" alt="">
                <div class="content">
                    Zona Kesehatan dan Pemulihan
                </div>
            </div>
            <div class="item">
                <img src="https://images.pexels.com/photos/10698437/pexels-photo-10698437.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                <div class="content">
                    Fasilitas Tambahan
                </div>
            </div>
        </div>
    </div>

  
    <!-- Sertakan file JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>