<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Transaksi</title>
    @vite('resources/css/app.css');
        <style>
            /* Gaya untuk memperlihatkan pop up card */
            .show-popup {
            display: flex;
            }
        </style>
<body>
    
<div>
    <div class="container mx-auto -mt-6 ">
        {{-- Produk Start --}}
        <div class="w-full p-5 sm:w-[550px] sm:mx-auto sm:mt-5 sm:rounded-md sm:shadow-lg">
            <div class="mb-5 -mt-3  grid grid-cols-4">
                <span class="text-sm font-medium justify-end col-start-4"><a href="{{ route('dashboard') }}">home</a> / <a href="{{ route('shop')}}">back</a></span>
            </div>
            <div class="flex">
                <img src="{{ asset('storage/images/'.$data->gambar) }}" alt="" class="rounded-lg shadow-lg max-h-[80px]">
                <div class="ml-5 ">
                    <h1 class="font-bold text-xl mb-2">{{$data->Paket}}</h1>
                    <p class="hidden text-xs sm:block">{{$data->deskripsipaket}}</p>
                    <button class="font-bold text-xs text-blue-800 sm:hidden" id="popupBtn">Cek Deksripsi Produk</button>
                </div>
            </div>
        </div>
        {{-- Produk End --}}

        {{-- Masuka Jumlah  Start  --}}
    <form action="{{route('transaksipaket.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- HIDDEN INPUT --}}
        <input type="text" class="hidden" name="name" value="{{ Auth::user()->name }}">
        <input type="text" class="hidden" name="idpaket" value="{{ $data->idpaket }}">
        <input type="text" class="hidden" name="Paket" value="{{ $data->Paket }}">
        <input type="text" class="hidden" name="gambar" value="{{ $data->gambar}}">

        {{-- Metode Transaksi Start --}}
<div class="rounded-md shadow-lg mt-5 px-5 py-5 border sm:w-[550px] sm:mx-auto">
    <h2 class="text-xl font-bold font-sans mb-3">Pilih Metode Pembayaran</h2>
    <p class="font-semibold mb-3">E-Wallet dan QRIS</p>
    <div class="sm:grid sm:grid-cols-2 sm:gap-2">
        <input type="radio" class="peer hidden" name="metode" value="Dana" id="Dana">
        <label for="Dana" class="group">
            <div class="flex w-full rounded-md shadow-md overflow-hidden mb-4 p-5 border-2 border-transparent group-focus-within:border-sky-500 group-active:border-sky-500">
                <input type="checkbox" id="Dana" class="absolute opacity-0 w-0 h-0 focus:ring-0 focus:outline-none">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" alt="" class="mr-3 h-[30px] sm:w-[55px] sm:h-[20px]">
                <p class="font-bold mt-1 w-full text-slate-500 sm:text-sm sm:mt-0 sm:hidden">Dana</p>
                <div class="w-full">
                    <h2 class="text-lg sm:text-sm font-semibold">Rp. <span class="font-bold text-sm" id="totalPriceDana">{{ $data->harga }}</span></h2>
                </div>
            </div>
        </label>
        
        <input type="radio" class="peer hidden" name="metode" value="Indomaret" id="indomaret">
        <label for="indomaret" class="group">
            <div class="flex w-full rounded-md shadow-md overflow-hidden mb-4 p-5 border-2 border-transparent group-focus-within:border-sky-500 group-active:border-sky-500">
                <input type="checkbox" id="indomaret" class="absolute opacity-0 w-0 h-0 focus:ring-0 focus:outline-none">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Logo_Indomaret.png" alt="" class="mr-3 h-[30px] sm:w-[55px] sm:h-[20px]">
                <p class="font-bold w-full mt-1 text-slate-500 sm:text-sm sm:mt-0 sm:hidden">Indomaret</p>
                <div class="w-full">
                    <h2 class="text-lg sm:text-sm font-semibold">Rp. <span class="font-bold text-sm" id="totalPriceIndomaret">{{ $data->harga }}</span></h2>
                </div>
            </div>
        </label>
        
        <input type="radio" class="peer hidden" name="metode" value="Alfamart" id="alfamart">
        <label for="alfamart" class="group">
            <div class="flex w-full rounded-md shadow-md overflow-hidden mb-4 p-5 border-2 border-transparent group-focus-within:border-sky-500 group-active:border-sky-500">
                <input type="checkbox" id="alfamart" class="absolute opacity-0 w-0 h-0 focus:ring-0 focus:outline-none">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/ALFAMART_LOGO_BARU.png/1200px-ALFAMART_LOGO_BARU.png" alt="" class="mr-3 h-[30px] sm:w-[55px] sm:h-[20px]">
                <p class="font-bold mt-1 w-full text-slate-500 sm:text-sm sm:mt-0 sm:hidden">Alfamart</p>
                <div class="w-full">
                    <h2 class="text-lg sm:text-sm font-semibold">Rp. <span class="font-bold text-sm" id="totalPriceAlfamart">{{ $data->harga }}</span></h2>
                </div>
            </div>
        </label>
        
        <input type="radio" class="peer hidden" name="metode" value="OVO" id="ovo">
        <label for="ovo" class="group">
            <div class="flex w-full rounded-md shadow-md overflow-hidden mb-4 p-5 border-2 border-transparent group-focus-within:border-sky-500 group-active:border-sky-500">
                <input type="checkbox" id="ovo" class="absolute opacity-0 w-0 h-0 focus:ring-0 focus:outline-none">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/512px-Logo_ovo_purple.svg.png" alt="" class="mr-3 h-[30px] sm:w-[55px] sm:h-[20px]">
                <p class="font-bold mt-1 w-full text-slate-500 sm:text-sm sm:mt-0 sm:hidden">OVO</p>
                <div class="w-full">
                    <h2 class="text-lg sm:text-sm font-semibold">Rp. <span class="font-bold text-sm" id="totalPriceOvo">{{ $data->harga }}</span></h2>
                </div>
            </div>
        </label>
    </div>
</div>
        
        {{-- Metode Transaksi End --}}

         {{-- Kontak Start --}}
         <div class="rounded-md shadow-lg  w-full mt-5 px-5 border sm:w-[550px] sm:mx-auto">
            <h2 class="text-xl font-sans font-bold mb-3 mt-2">Nomor Anda</h2>
                <input type="number" name="number" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none rounded-md shadow-lg mb-4 h-[40px] w-full p-5 font-semibold text-lg" placeholder="Masukan Nomor HP Anda"/>
        </div>
        {{-- Kontak End --}}

        {{-- Botton Bayar Start --}}
        <div class="rounded-md shadow-lg  w-full mt-5 px-5 grid grid-cols-3 gap-1 p-3 border-t  sm:w-[550px] sm:mx-auto">
            <div class="font-sans m-5 col-span-2">
                <h2 class="text-red-500 font-bold" id="totalPriceAll">Rp. {{ $data->harga }}</h2>
                <input type="hidden" name="harga" id="hiddenTotalPrice"  value="{{ $data->harga}}">
                <p class="text-sm text-slate-500">{{ $data->Paket }}</p>
                <p class="text-sm text-slate-500" id="selected-method"></p>
            </div>
            <div class="col-start-3 flex">
                <div class="self-center">
                    <button type="submit" name="submit" class="bg-primary p-2  rounded-full shadow-lg text-sm text-white font-bold active:opacity-40 active:text-slate-100 sm:w-32">Beli Sekarang</button>
                </div>
            </div>
        </div>
        {{-- Botton Bayar End --}}
    </div>
</div>
</form>
    {{-- Pop Up card start--}}
        <div class="fixed inset-0  items-center justify-center bg-black bg-opacity-50 hidden" id="popup">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-[370px]">
                <div class="bg-gray-100 flex p-5 -mt-[32px] mb-3 -mx-8 rounded-t-lg justify-between items-center">
                    <h2 class="font-bold text-gray-500 text-lg">Deskripsi Paket</h2>
                    <button id="closePopup" class="w-7">
                        <svg focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="CloseIcon"><path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg>
                    </button>
                </div>
            <p class="text-sm font-semibold text-justify">{{$data->deskripsipaket}}</p>
           
            </div>
        </div>
    <script>
     document.addEventListener('DOMContentLoaded', function () {
        const radios = document.querySelectorAll('input[name="metode"]');
        const selectedMethod = document.getElementById('selected-method');

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    selectedMethod.textContent = ` ${this.value}`;
                }
            });
        });
    });

            // Fungsi untuk menampilkan pop up card
            function showPopup() {
        document.getElementById('popup').classList.add('show-popup');
        }
    
        // Fungsi untuk menyembunyikan pop up card
        function hidePopup() {
        document.getElementById('popup').classList.remove('show-popup');
        }
    
        // Event listener untuk tombol "Cek Deskripsi Produk"
        document.querySelector('#popupBtn').addEventListener('click', function() {
        showPopup();
        });
    
        // Event listener untuk tombol "Tutup"
        document.querySelector('#closePopup').addEventListener('click', function() {
        hidePopup();
        });
        
    </script>
    {{-- Js untuk Memunculkan Pop up Card End --}}
</body>
</html>