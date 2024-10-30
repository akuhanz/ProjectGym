@extends('layout.tailwind')
@section('content')



        <img src="{{ asset('storage/images/wallpaper.jpg')}}" alt="" class="w-full sm:h-[400px] sm:object-cover">
        
       
        <div id="produk" class="container relative  w-full -my-7 sm:-my-14">
            <div class="px-4 py-4 bg-metalTerang rounded-xl ">
                <div class="flex mb-2 justify-between">
                    <h1 class="font-bold text-white text-sm sm:text-2xl mx-5">Riwayat Transaksi</h1>
                </div>

                
                <div class="container mx-auto">
                    <div class="overflow-y-auto max-h-80 rounded-lg scrollbar-hidden">
                        <table class="min-w-full bg-white border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 rounded-t-lg bg-gray-100">Tanggal</th>
                                    <th class="px-6 py-3 bg-gray-100">Pengeluaran</th>
                                    <th class="px-6 py-3 bg-gray-100">Aktivitas</th>
                                    <th class="px-6 py-3 bg-gray-100">Nama</th>
                                    <th class="px-6 py-3 rounded-t-lg bg-gray-100">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($transactionPaket as $paket)
                                <tr>
                                    <td class="px-6 py-2 border-b border-gray-300">{{ $paket->created_at }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300">-{{ $paket->harga }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300">membeli paket {{ $paket->Paket }}</td>
                                    <td class="px-6 py-2 border-b border-gray-300">
                                        <div class="flex justify-center items-center">
                                            <img src="{{ asset('storage/profile/ProfileContoh.jpg') }}" alt="" class="rounded-full w-9 h-9">
                                            <h1 class="ml-2">{{ Auth::user()->name }}</h1>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 border-b border-gray-300">
                                        @if ($paket->status === 'dibayar')
                                        <div class="bg-green-700 rounded-full shadow">
                                            <h1 class="text-white text-center">Berhasil</h1>
                                        </div>
                                        @else
                                        <div class="bg-red-700 rounded-full shadow">
                                            <h1 class="text-white text-center">Belum Dibayar</h1>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                   
                
                
                

            </div>

        </div>
        
        <style>
            .scrollbar-hidden::-webkit-scrollbar {
                display: none; /* Safari and Chrome */
            }
            
            .scrollbar-hidden {
                -ms-overflow-style: none;  /* Internet Explorer and Edge */
                scrollbar-width: none;  /* Firefox */
            }
            table {
                border-collapse: collapse;
            }

            thead th {
                position: sticky;
                top: 0;
                z-index: 10; /* Ensure the header stays above other content */
            }
            </style>

       

 @endsection