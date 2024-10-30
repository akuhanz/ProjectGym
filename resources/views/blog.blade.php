<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Design Journal</title>
   {{-- TailwindCSS --}}
   @vite('resources/css/app.css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    
</head>
<body class="bg-metal">
    <header class=" -top-1 px-0 w-full flex items-center bg-metalTerang shadow-black shadow-sm">
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
                    
                    <nav id="nav-menu" class="hidden absolute  py-5  shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static  lg:max-w-full lg:shadow-none lg:rounded-none">
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
                                  <a href="{{ route('login') }}" class="py-2 px-5 mx-5 bg-green-500 rounded-full bg-opacity-75 text-white">Masuk</a>
                              @endif
                        </ul>
                    </nav>
                </div>
            </div> 
        </div>
    </header>  

<main class="container mx-auto px-4 py-8">
    <section class="mb-8 mx-auto">
        <div class="relative overflow-hidden rounded-lg shadow-black shadow-sm">
            <img alt="A woman holding a paper and looking at it thoughtfully in a bright room with plants and an easel" class="w-screen rounded-lg h-auto max-h-[650px] object-cover object-center" src="{{ asset('storage/Asset/PictVim.jpg') }}"/>
                <div class="absolute bottom-0 left-0 right-0 rounded-lg bg-metal bg-opacity-35 backdrop-blur-[11px] border border-white border-opacity-20 shadow-metal shadow-sm  text-white p-6 m-[20px]">
                    <h2 class="text-lg font-semibold">Featured</h2>
                    <h1 class="text-2xl font-bold max-w-[80%]">Switching From Photography to UX Design: Everything You Need to Know With Viola LeBlanc</h1>
                    <p class="mt-2 max-w-[75%]">Viola LeBlanc is a 23-year-old photographer and product designer from Toronto, Ontario. She has worked with Spotify, Niko, Chews, Makr, and Square. Sophia Munn asked her a few questions about her work.</p>
                </div>
        </div>
    </section>

    <section class="mb-8">
        <div class="flex justify-between items-center my-5 mx-2">
            <h2 class="text-xl font-bold text-white">Postingan Terbaru</h2>
            <div class="bg-blue-300 py-2 px-4 rounded-md bg-opacity-35 ">
                <a class="text-blue-400 font-bold hover:text-blue-600" href="#">Lihat Semua Postingan</a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <article class="bg-white bg-opacity-10 backdrop-blur rounded-lg shadow">
                <img alt="A woman in a white top looking to the side" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/TbpEdTYOrn72ON0CDoiefQ9mAX1w1L7eKg4Z0gUPkzTkSYHnA.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-white">How Remote Collaboration Makes Us Better Product Designers</h3>
                    <p class="text-sm text-gray-200">Collaboration can make our teams stronger, and our individual designs better. Remote work has made new challenges to remote collaboration, but thankfully...</p>
                    <div class="mt-4 flex items-center text-sm text-gray-100">
                        <div class="mx-2">
                            <img src="{{ asset('storage/profile/ProfileContoh.jpg') }}" alt="" class="w-8 h-8 rounded-full">
                        </div>
                        <span class="mr-2">Steven Kurniawan</span>
                        <span>• 18 Jan 2024</span>
                    </div>
                </div>
            </article>
            <article class="bg-white bg-opacity-10 backdrop-blur rounded-lg shadow">
                <img alt="A woman in a white top looking to the side" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/LyjZWqkCCNrLAVTTJ1437o2DfX6JVgJ3qTeadN4vPC4VJsjTA.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-white">Best Books on Scaling Your Early-Stage Startup</h3>
                    <p class="text-sm text-gray-200">This collection of the best startup books for scaling your startup are packed full with valuable and actionable advice to take your business to the next level!</p>
                    <div class="mt-4 flex items-center text-sm text-gray-100">
                        <div class="mx-2">
                            <img src="{{ asset('storage/profile/ProfileContoh2.jpg') }}" alt="" class="w-8 h-8 rounded-full">
                        </div>
                        <span class="mr-2">Ade Setiawan</span>
                        <span>• 14 Jan 2024</span>
                    </div>
                </div>
            </article>
            <article class="bg-white bg-opacity-10 backdrop-blur rounded-lg shadow">
                <img alt="A variety of fresh fruits and vegetables on a table" class="w-full h-48 object-cover" height="300" src="https://storage.googleapis.com/a1aa/image/5XoOFleMlQVSSSJfcHeIUYtDiu2tCWe6yx22UN0qE4sElwOOB.jpg" width="400"/>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-white">Why Food Matters — Disease Prevention & Treatment</h3>
                    <p class="text-sm text-gray-200">Eating more plants and less meat has been tied to a longer life and a reduced risk of cardiovascular disease. A new study, with a 16% lower risk of cardiovascular disease...</p>
                    <div class="mt-4 flex items-center text-sm text-gray-100">
                        <div class="mx-2">
                            <img src="{{ asset('storage/profile/ProfileContoh3.jpg') }}" alt="" class="w-8 h-8 rounded-full">
                        </div>
                        <span class="mr-2">DeanKT</span>
                        <span>• 9 Jan 2024</span>
                    </div>
                </div>
            </article>
        </div>
        <div class="mt-8 text-center">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-800">Loading more...</button>
        </div>
    </section>
</main>

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
