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
        .popup-enter {
    transform: translateY(100%);
  }
  .popup-enter-active {
    transform: translateY(0);
    transition: transform 0.5s ease-in-out;
  }
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

  @yield('content')

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

// pop up
document.addEventListener('DOMContentLoaded', function () {
  const popupOverlay = document.getElementById('popupOverlay');
  const popup = document.getElementById('popup');
  const closePopupButton = document.getElementById('closePopup');
  
  // Function to show the popup
  const showPopup = (button) => {
    const id = button.getAttribute('data-id');
    const nama = button.getAttribute('data-nama');
    const harga = button.getAttribute('data-harga');
    const tanggal = button.getAttribute('data-tanggal');
    const gambar = button.getAttribute('data-gambar');
    const metode = button.getAttribute('data-metode');
    
    document.getElementById('popupId').innerText = id;
    document.getElementById('popupName').innerText = nama;
    document.getElementById('popupPrice').innerText = harga;
    document.getElementById('popupDate').innerText = tanggal;
    document.getElementById('popupImage').src = gambar;
    document.getElementById('popupMethod').innerText = metode;
    
    popupOverlay.classList.remove('hidden');
    popupOverlay.classList.add('flex');
    setTimeout(() => {
      popup.classList.remove('popup-enter');
      popup.classList.add('popup-enter-active');
    }, 10); // Delay to ensure the transition effect
  };

  // Event listener for buttons
  document.querySelectorAll('.open-popup').forEach(button => {
    button.addEventListener('click', function() {
      showPopup(this);
    });
  });

  // Event listener for closing the popup
  closePopupButton.addEventListener('click', function() {
    popup.classList.add('popup-enter');
    popup.classList.remove('popup-enter-active');
    setTimeout(() => {
      popupOverlay.classList.add('hidden');
      popupOverlay.classList.remove('flex');
    }, 300); // Match the transition duration
  });
});

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