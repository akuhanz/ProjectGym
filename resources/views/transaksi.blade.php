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
<body class="bg-metal">
    
<div>
    <div class="container mx-auto -mt-6 ">
        {{-- Produk Start --}}
        <div class="w-full p-5 bg-metalTerang sm:w-[550px] sm:mx-auto sm:mt-5 sm:rounded-md sm:shadow-lg">
            <div class="mb-5 -mt-3  grid grid-cols-4">
                <span class="text-sm text-slate-200 font-medium col-start-5 "><a href="{{ route('dashboard') }}">home</a> / <a href="{{ route('shop')}}">back</a></span>
            </div>
            <div class="flex">
                <img src="{{ asset('storage/images/'.$data->gambar) }}" alt="" class="rounded-lg shadow-lg max-h-[80px]">
                <div class="ml-5 ">
                    <h1 class="font-bold text-white text-xl mb-2">{{$data->Paket}}</h1>
                    <p class="hidden text-gray-200 text-xs sm:block">{{$data->deskripsipaket}}</p>
                    <button class="font-bold text-xs text-blue-800 sm:hidden" id="popupBtn">Cek Deksripsi Produk</button>
                </div>
            </div>
        </div>
        {{-- Produk End --}}

        {{-- Masuka Jumlah  Start  --}}
    <form action="{{route('transaksi.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- HIDDEN INPUT --}}
        <input type="text" class="hidden" name="name" value="{{ Auth::user()->name }}">
        <input type="text" class="hidden" name="idpaket" value="{{ $data->idpaket }}">
        <input type="text" class="hidden" name="Paket" value="{{ $data->Paket }}">
        <input type="text" class="hidden" name="gambar" value="{{ $data->gambar}}">
        
         {{-- Kontak Start --}}
         <div class="rounded-md shadow-lg bg-metalTerang  w-full mt-5 px-5 py-5 sm:w-[550px] sm:mx-auto">
            <h2 class="text-xl text-white font-sans font-bold mb-3">Nomor Anda</h2>
                <input type="number" name="number" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none rounded-md shadow-lg mb-4 h-[40px] w-full p-5 font-semibold text-lg" placeholder="Masukan Nomor HP Anda"/>
        </div>
        {{-- Kontak End --}}

        {{-- Botton Bayar Start --}}
        <div class="rounded-md shadow-lg bg-metalTerang w-full mt-5 px-5 grid grid-cols-3 gap-1 p-3 border-t sm:w-[550px] sm:mx-auto">
            <div class="font-sans m-5 col-span-2">
                <h2 class="text-red-500 font-bold" id="totalPriceAll">{{ $data->harga }}</h2>
                <input type="hidden" name="harga" id="hiddenTotalPrice"  value="{{ $data->harga}}">
                <p class="text-sm text-slate-300">{{ $data->Paket }}</p>
            </div>
            <div class="col-start-3 flex">
                <div class="self-center">
                    <button type="submit" name="submit" class="bg-primary p-2 rounded-full shadow-lg text-sm text-white font-bold active:opacity-40 active:text-slate-100 w-28 md:w-32">Beli Sekarang</button>
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