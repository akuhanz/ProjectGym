<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard By rehanz</title>

    {{-- TailwindCSS --}}
    @vite('resources/css/app.css')


    <style>
        /* Untuk membuat tombol scroll ke kiri dan kanan */
        
        .scroll-btn-responsive{
            width: 20px;
            height: 20px;
            border-radius: 100%;
            cursor: pointer
        }

        .scroll-btn:focus {
        outline: none;
        }
    </style>



</head>
<body class=" bg-metal">
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
                              <a href="{{ route('logout') }}" class="py-2 px-5 mx-5 bg-red-700 rounded-full text-white hover:bg-opacity-70 ease-in-out duration-300">Keluar</a>
                              @else
                                  <a href="{{ route('login') }}" class="py-2 px-5 mx-5 login-bottom">Masuk</a>
                              @endif
                        </ul>
                    </nav>
                </div>
            </div> 
        </div>
    </header>  

    <div class=" w-auto mb-20">
        <img src="{{ asset('storage/images/wallpaper.jpg')}}" alt="" class="w-full sm:h-[400px] sm:object-cover shadow-md">
            <div id="produk" class="container w-auto mx-14 md:-my-14 bg-metalTerang px-0 rounded-lg">
                <div class="px-4 py-4 bg-metalTerang rounded-lg relative">
                    <h1 class="font-bold text-xl text-white mb-4 md:text-2xl">MARI MEMULAI HIDUP SEHAT</h1>
                    <hr class="mt-4">
                </div>

      
                <div class="flex justify-center items-center">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10 text-white">
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


                <div class="fixed inset-0  items-center justify-center bg-black bg-opacity-50 hidden" id="popup">
                    <div class="bg-white p-8 rounded-lg shadow-lg max-w-[370px]">
                        <div class="bg-gray-100 flex p-5 -mt-[32px] mb-3 -mx-8 rounded-t-lg justify-between items-center">
                            <h2 class="font-bold text-gray-500 text-lg">Deskripsi Produk</h2>
                            <button id="closePopup" class="w-7">
                                <svg focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="CloseIcon"><path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg>
                            </button>
                        </div>
                    <p class="text-sm font-semibold text-justify">Produk Sudah Habis</p>
                
                    </div>
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
    

    <script>
         function showOutOfStockAlert() {
        alert("Produk sudah habis");
    }
      // Nabar FIxed 
    window.onscroll = function(){
        const header = document.querySelector('header');
        const fixedNav = header.offsetTop;
    
        if(window.pageYOffset > fixedNav) {
            header.classList.add('navbar-fixed');         
        }else {
            header.classList.remove('navbar-fixed');
        }
    }
    
    
    //hamburger
    const hamburger = document.querySelector('#hamburger');
    const navMenu = document.querySelector('#nav-menu');
    
    hamburger.addEventListener('click', function(){
        hamburger.classList.toggle('hamburger-active');
        navMenu.classList.toggle('hidden');
    });
    
    // click diluar hamburger
    window.addEventListener('click', function(e){
        if(e.target != hamburger && e.target != navMenu){
            hamburger.classList.remove('hamburger-active');
            navMenu.classList.add('hidden');
        }
    });
    
    // const scrollLeftBtn = document.getElementById('scroll-left');
    //   const scrollRightBtn = document.getElementById('scroll-right');
    //   const container = document.querySelector('.overflow-x-auto');
    
    //   scrollLeftBtn.addEventListener('click', () => {
    //     container.scrollLeft -= 100; // Ubah angka ini untuk mengatur kecepatan scroll
    //   });
    
    //   scrollRightBtn.addEventListener('click', () => {
    //     container.scrollLeft += 100; // Ubah angka ini untuk mengatur kecepatan scroll
    //   });
    
    </script>
    
    </body>
    </html>