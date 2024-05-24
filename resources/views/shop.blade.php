<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard By rehanz</title>

    {{-- TailwindCSS --}}
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="{{ asset('LTE/dist/icon/css/all.min.css')}}">

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
                            <a href="{{ route('shop')}}" id="nav-text" class="text-base text-dark lg:text-white py-2 mx-8 flex group-hover:text-primary ">shop</a>
                        </li>
                        @if(Auth::user()->role === 'admin')
                        <li class="group">
                            <a href="{{ route('dashboardadmin')}}"  id="nav-text" class="text-base text-dark lg:text-white py-2 mx-8 flex group-hover:text-primary ">Admin</a>
                        </li>
                        @endif
                        <li class="group mt-2">
                            <a href="{{ route('logout') }}" class="py-2 px-3 mx-5 my-2 bg-red-700 rounded-full text-white hover:bg-opacity-70 ease-in-out duration-300">Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header> 

<div class="-mt-[80px]">

        <img src="https://images.unsplash.com/photo-1708287532430-c37b650b39c3?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full sm:h-[400px] sm:object-cover">
        <div id="produk" class="container w-full -my-7 md:-my-14">
           <div class="px-4 py-4 bg-white rounded-t-lg relative">
            <h1 class="font-bold text-xl mb-4 md:text-2xl">Give All You Need</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 lg:grid-cols-4">
                @foreach ($data as $produk)
                <div class="w-full mb-3 md:max-w-[200px] lg:max-w-[300px]">
                    <img src="{{ asset('storage/produk/'.$produk->gambar) }}" alt="" class="max-w-[150px] h-[150px] md:w-[200px] md:shadow-md md:h-[200px] rounded-lg md:max-w-[300px] md:mb-2 lg:w-[300px] lg:h-[300px] object-cover">
                    <h1 class="font-bold text-lg font-sans truncate md:text-2xl md:mb-3 uppercase">{{$produk->nameproduk}}</h1>
                    <div class="flex md:mb-5">
                        <p class="font-semibold md:text-lg w-7 md:w-10 lg:w-36">⭐ 5.0 <span class="hidden lg:inline lg:text-xs">(1.5k Riviews)</span></p>
                        <h2 class="ml-4 self-center font-semibold md:text-xl ">Rp. {{ $produk->harga}}</h2>
                    </div>
                    <div class="flex justify-center sm:justify-normal">
                        <a href="{{route('transaksi',['id' => $produk->id])}}" class="bg-black px-3 py-1 rounded-lg ml-3 text-sm sm:w-28 sm:h-10 sm:rounded-full sm:px-6 sm:py-[10px] lg:w-32"><span class="font-bold text-white lg:ml-2">Buy Now</span></a>
                    </div>
                </div>
               
                @endforeach
            </div> 
            <hr class="mt-4">
            <div class="flex justify-center mt-8">
                {{ $data->links() }}
          
            </div>
        </div>

        <div id="paket" class="container mx-auto py-2">
            <div class="flex justify-between">
                <h1 class="font-bold mb-4 text-xl sm:text-3xl ">Explore our recommendations</h1>
                <div class="flex gap-2 mt-4 sm:mt-0">
                    <button id="scroll-left" class="w-7 h-7 sm:w-10 sm:h-10 rounded-full bg-gray-500 text-white cursor-pointer">&lt;</button>
                    <button id="scroll-right" class="w-7 h-7 sm:w-10 sm:h-10 rounded-full bg-gray-500 text-white cursor-pointer">&gt;</button>
               </div>
            </div>
          </div>
            <div class="flex overflow-x-auto scrollbar-hide space-x-4">
              <!-- Product Cards -->
              @foreach ($datap as $paket)
              <div class="p-3 flex-none w-[300px] lg:w-[450px]" >
                <img src="{{ asset('storage/images/'.$paket->gambar) }}" alt="Product Image" class="w-full h-48 object-cover mb-4 rounded-lg lg:h-56">
                <h2 class="font-bold font-sans truncate text-2xl mb-3">{{$paket->Paket}}</h2>
                <p class="text-gray-700 mb-2 truncate">{{$paket->deskripsipaket}}</p>
                <p class="font-semibold text-lg mb-4">Rp. {{$paket->harga}}</p>
                <a href="{{route('transaksipaket',['id' => $paket->id])}}" class="left-0 bg-black w-28 h-10 rounded-full px-6 py-[10px] "><span class="font-bold text-white ">Buy Now</span></a>
              </div>
              @endforeach
              <!-- More Product Cards -->
            </div>
            
        <hr class="mt-4 w-full">
        <footer class="mt-4 p-2">
            <div class="flex justify-between">
                <h1 class="font-semibold text-slate-500 text-xs">Copyright by hanz</h1>
                <div class="flex">
                    <!-- Github -->
                    <a href="https://github.com/akuhanz" target="_blank" class="w-7 h-7 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg role="img" viewBox="0 0 24 24" width="25" xmlns="http://www.w3.org/2000/svg" class="fill-current">
                            <title>GitHub</title>
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                        </svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/hanzyozakura?igsh=cnNzZmJqcGR2Yzk=" target="_blank" class="w-7 h-7 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg role="img" viewBox="0 0 24 24" width="25" xmlns="http://www.w3.org/2000/svg" class="fill-current">
                            <title>Instagram</title>
                            <path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>

        
    </div>

    <script>
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
    
    const scrollLeftBtn = document.getElementById('scroll-left');
      const scrollRightBtn = document.getElementById('scroll-right');
      const container = document.querySelector('.overflow-x-auto');
    
      scrollLeftBtn.addEventListener('click', () => {
        container.scrollLeft -= 100; // Ubah angka ini untuk mengatur kecepatan scroll
      });
    
      scrollRightBtn.addEventListener('click', () => {
        container.scrollLeft += 100; // Ubah angka ini untuk mengatur kecepatan scroll
      });
    
    </script>
    
    </body>
    </html>