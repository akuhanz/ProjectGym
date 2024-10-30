<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard By rehanz</title>

     {{-- TailwindCSS --}}
     @vite('resources/css/app.css')


      <!-- Sertakan pustaka Bootstrap Icons (untuk ikon sosial media) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


   
    {{-- Link file CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <header class="navbar-fixed -top-1 px-0 w-full flex items-center opacity-85 bg-metal">
        <div class="container ">
            <div class="flex items-center justify-between relative">
                <div class="px-4 flex">
                    <img src="{{ asset('storage/images/VIm.jpeg')}}" alt="" class="w-8 h-8 mt-5 mx-3 rounded-full">
                    <a href="#home" class="font-bold text-lg text-white block py-6">Vim Fitness</a>
                </div>
                <div class="flex items-center px-4 ">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line bg-white transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line bg-white transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line bg-white transition duration-300 ease-in-out origin-top-left"></span>
                    </button>
                    
                    <nav id="nav-menu" class="hidden absolute  py-5 bg-metal  shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static  lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex ">
                            <li class="group">
                                <a href="{{ route('dashboard') }}" id="nav-text" class="text-base text-white lg:text-white py-2 mx-8 flex  group-hover:text-primary ">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="{{ route('riwayattransactionpaket') }}" id="nav-text" class="text-base text-white lg:text-white py-2 mx-8 flex group-hover:text-primary ">Riwayat</a>
                            </li>
                            <li class="group">
                                <a href="{{ route('shop')}}" id="nav-text" class="text-base text-white lg:text-white py-2 mx-8 flex group-hover:text-primary ">Pesan</a>
                            </li>
                            <li class="group">
                                <a href="{{ route('blog')}}" id="nav-text" class="text-base text-white lg:text-white py-2 mx-8 flex group-hover:text-primary ">Blog</a>
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
                              <a href="{{ route('logout') }}" class="py-1 px-4 mx-5 bg-red-700 rounded-full text-white hover:bg-opacity-70 ease-in-out duration-300">Keluar</a>
                              @else
                                  <a href="{{ route('login') }}" class="py-2 px-5 mx-5 login-bottom">Masuk</a>
                              @endif
                        </ul>
                    </nav>
                </div>
            </div> 
        </div>
    </header>  


     {{-- Slider --}}
     <div class="slider">
        <div class="list">
            <div class="item active">
                <img src="{{ asset('storage/Asset/PictVim.jpg') }}" alt="">
                <div class="content">
                    <p>Point Pertama</p>
                    <h2>Peralatan Kardio dan Kekuatan Lanjutan</h2>
                    <p>Gym kami dilengkapi dengan teknologi kebugaran terbaru, termasuk treadmill, mesin elliptical, sepeda statis, beban bebas, dan mesin resistensi. Apakah Anda ingin meningkatkan kesehatan kardiovaskular atau membangun otot, berbagai peralatan kami cocok untuk semua tingkat kebugaran dan tujuan.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/Asset/PictVim2.jpg') }}" alt="">
                <div class="content">
                    <p>Point Kedua</p>
                    <h2>Studio Khusus untuk Kebugaran Grup</h2>
                    <p>Kami menawarkan berbagai kelas kebugaran grup di studio khusus kami. Nikmati suasana tenang di studio yoga dan Pilates kami, atau lingkungan penuh energi di studio bersepeda dan tari kami. Kelas-kelas kami dirancang untuk membuat Anda tetap termotivasi dan terlibat, membantu Anda mencapai tujuan kebugaran dalam suasana yang menyenangkan dan mendukung.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('storage/Asset/pictVim4.jpg') }}" alt="">
                <div class="content">
                    <p>Point Ketiga</p>
                    <h2>Zona Kesehatan dan Pemulihan</h2>
                    <p>Setelah berolahraga berat, santai dan pulihkan diri di zona kesehatan dan pemulihan kami. Fasilitas kami mencakup sauna dan ruang uap untuk membantu Anda detoksifikasi dan bersantai, serta layanan terapi pijat profesional untuk membantu pemulihan otot dan relaksasi. Kami percaya pada pendekatan holistik terhadap kebugaran yang mencakup kesejahteraan fisik dan mental.</p>
                </div>
            </div>
        </div>
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>

        <div class="thumbnail">
            <div class="item active">
                <img src="{{ asset('storage/Asset/PictVim.jpg') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('storage/Asset/PictVim2.jpg') }}" alt="">
            </div>
            <div class="item">
                <img src="{{ asset('storage/Asset/PictVim4.jpg') }}" alt="">
            </div>
        </div>
    </div>

    <section class="hero-section">
        <div class="section">
        <div class="box">
            <h1 class="font-bold text-3xl sm:text-7xl">Vim Fitness</h1>
            <p class="my-6">Terletak di jalan Pinus No 3 - 10, Sungai Miai, kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan  70123, Buka Setiap hari dari jam 7 sampai 10 malam, Untuk hari minggu dari Jam 7 sampai jam 9 malam.</p>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4112.9035405144095!2d114.5941370751308!3d-3.2904350411013934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423d7383c82a3%3A0x6f81ee9253e6904d!2sVIM%20Fitnes!5e1!3m2!1sid!2sid!4v1727455062849!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>


    <div class="mx-auto p-4 bg-metal">
        <div class="text-center mb-6">
            <h1 class="text-4xl md:text-5xl font-bold">TERLARIS</h1>
        </div>
        <div class="flex justify-center items-center">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
                <!-- Product Cards -->
                @foreach ($datap as $paket)
                <div class="bg-white p-2 rounded-lg w-72 bg-opacity-10 backdrop-blur px-3">
                    <img src="{{ asset('storage/images/'.$paket->gambar) }}" alt="Aerospace Ball" class="w-full h-48 object-cover rounded-lg mb-2"/>
                    <h2 class="text-lg font-bold mb-1">{{$paket->Paket}}</h2>
                    <p class="mb-3 text-sm truncate">{{$paket->deskripsipaket}}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold">{{$paket->harga}}</span>
                        <a href="{{route('transaksi',['id' => $paket->id])}}" class=" bg-buy  px-2 py-1 rounded-full flex items-center"><span class="font-bold text-white ">Pesan Sekarang   <i class="fas fa-arrow-right ml-1 mt-1"></i></span></a>
                    </div>
                
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

     <!-- Footer -->
     <footer class="bg-metalTerang text-white py-8">
        <div class="container mx-auto px-14">
            <div class="flex flex-wrap justify-between">
                <!-- Bagian Kontak -->
                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                    <div class="flex mb-4 space-x-2">
                        <img src="{{ asset('storage/images/VIm.jpeg')}}" alt="" class="h-7 rounded-full">
                        <h5 class="text-lg font-semibold ">Vim Fitness</h5>
                    </div>
                    <div class="space-y-2 text-sm md:max-w-[55%]">
                        <p><strong>Nomor :</strong> +62 812-3456-7890</p>
                        <p><strong>Email :</strong> info@fitnessclub.com</p>
                        <p><strong>Alamat :</strong> Jl. Pinus No 3 - 10, Sungai Miai, kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123</p>
                    </div>
                </div>

                <!-- Bagian Company, Resources, dan Legal -->
                <div class="w-full md:w-1/2 flex justify-between md:justify-start space-x-12">
                    <!-- Company Section -->
                    <div>
                        <h6 class="text-lg font-bold mb-2">Company</h6>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Blog</a></li>
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Careers</a></li>
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Pricing</a></li>
                        </ul>
                    </div>

                    <!-- Resources Section -->
                    <div>
                        <h6 class="text-lg font-bold mb-2">Resources</h6>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Documentation</a></li>
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Papers</a></li>
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Press Conferences</a></li>
                        </ul>
                    </div>

                    <!-- Legal Section -->
                    <div>
                        <h6 class="text-lg font-bold mb-2">Legal</h6>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Terms of Service</a></li>
                            <li><a href="#" class="text-sm hover:text-hoverFooter">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bagian Footer Bawah -->
            <div class="flex flex-wrap justify-between items-center mt-6 border-t border-gray-700 pt-4">
                <span class="text-sm text-gray-400">&copy; 2024 Fitness Club | All Rights Reserved</span>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/vim_fitness.idn" target="_blank" class="text-xl hover:text-hoverFooter transition duration-300">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/" target="_blank" class="text-xl hover:text-hoverFooter transition duration-300">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://www.twitter.com/" target="_blank" class="text-xl hover:text-hoverFooter transition duration-300">
                        <i class="bi bi-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

   
  
    <!-- Sertakan file JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>