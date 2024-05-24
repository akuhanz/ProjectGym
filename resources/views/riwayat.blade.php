@extends('layout.tailwind')
@section('content')



        <img src="https://images.unsplash.com/photo-1708287532430-c37b650b39c3?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full sm:h-[400px] sm:object-cover">
        
       
        <div id="produk" class="container relative  w-full -my-7 sm:-my-14">
            <div class="px-4 py-4 bg-white rounded-t-lg">
              <div class="flex mb-2 justify-between">
                <h1 class="font-bold text-sm sm:text-2xl">History Transaction Produk</h1>
                <a href="{{ route('riwayattransactionpaket')}}" class="inline-block -mt-1 px-2 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm xl:text-lg xl:px-6 xl:py-2 xl:rounded-xl">Paket</a>
            </div> 
              
              
              {{-- History Pembelian Produk --}}
              @if(!empty($transactionDetails) && count($transactionDetails) > 0)
              <div class="xl:flex xl:flex-wrap xl:ml-8">
              @foreach ($transactionDetails as $detail)
              <div class="xl:mx-7 xl:my-5">
                  <button class="cursor-pointer open-popup" type="button" 
                          data-id="{{ $detail->idTransaksi }}"
                          data-nama="{{ $detail->nameproduk }}"
                          data-harga="{{ $detail->harga }}"
                          data-tanggal="{{ $detail->created_at }}"
                          data-gambar="{{ asset('storage/produk/'.$detail->gambar) }}"
                          data-metode="{{ $detail->metode }}"
                          id="openPopup" class="md:mx-auto">
                    <div class="w-full xl:bg-zinc-200 xl:rounded-2xl xl:shadow-md xl:max-h-[110px] xl:w-[650px] xl:p-5">
                      <div class="w-full mb-2 flex items-center">
                        <img src="{{ asset('storage/produk/'.$detail->gambar) }}" alt="" class="w-16 h-16 rounded-xl object-cover md:w-32 md:h-32 xl:h-20 xl:w-20 xl:object-cover xl:rounded-full">
                        <div class="mx-3 w-32 md:6 md:w-96 ">
                          <h2 class="font-bold text-sm font-sans xl:text-lg">{{ $detail->nameproduk}}</h2>
                          <p class="font-semibold text-xs text-slate-500 xl:text-base">{{ $detail->created_at}}</p>
                        </div>
                        <div class="mx-5">
                          <h1 class="font-bold text-base xl:text-lg">{{ $detail->harga}}</h1>
                        </div>
                      </div>
                      <hr class="my-4 xl:hidden">
                    </div>
                  </button>

                <!-- Popup Container -->
                <div class="fixed inset-0 bg-black bg-opacity-50 items-end justify-center hidden z-[999999]" id="popupOverlay">
                  <div class="bg-white w-full max-w-md mx-auto p-8 rounded-t-3xl shadow-lg transform transition-transform popup-enter md:max-w-xl md:" id="popup">
                    <div class="flex justify-between items-center mb-6">
                      <h2 class="font-bold text-gray-500 text-lg">Transaction Details</h2>
                      <button id="closePopup" class="text-gray-500 hover:text-gray-700">
                        <svg focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="CloseIcon" class="w-6 h-6">
                          <path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                        </svg>
                      </button>
                    </div>
                    <div class="flex items-center mb-6">
                      <img id="popupImage" src="" alt="" class="rounded-full w-16">
                      <div class="ml-3">
                        <h2 id="popupName" class="font-bold text-lg font-sans"></h2>
                        <p id="popupDate" class="font-semibold text-sm text-slate-500"></p>
                      </div>
                      <div class="ml-auto flex items-center">
                        <h1 id="popupPrice" class="font-bold text-base"></h1>
                      </div>
                    </div>
                    <button class="w-full px-10 py-4 bg-gray-800 rounded-full text-white">Download Confirmation</button>
                    <hr class="w-full mt-4">
                    <div class="py-4">
                      <p>Transaction ID</p>
                      <h1 id="popupId"></h1>
                    </div>
                    <div class="py-4">
                      <p>Card Details</p>
                      <h1 id="popupMethod"></h1>
                    </div>
                    <div class="py-4">
                      <p>Contact</p>
                      <h1>{{ Auth::user()->email }}</h1>
                    </div>
                  </div>
                </div>
              </div>
                @endforeach
              </div>
              <div class="flex justify-center mt-2">
                {{ $transactionDetails->links() }}
              </div>
               @else
                <h1>Anda belum melakukan transaksi</h1>
               @endif               
            </div>



        </div>
        

       

@endsection