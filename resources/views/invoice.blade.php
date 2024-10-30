<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Halaman Transaksi</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

      {{-- TailwindCSS --}}
      @vite('resources/css/app.css')

</head>
<body class="bg-metal">
    
    <div class="h-screen flex justify-center items-center">
        <div class="flex flex-col justify-center items-center space-y-2">
            <!-- Card Pertama -->
            <div class="bg-white px-5 py-7 w-[500px] rounded-xl flex flex-col justify-center items-center">
                <div class="bg-green-400 rounded-full w-16 h-16 flex justify-center items-center bg-opacity-30 mb-4">
                    <i class="fa-solid fa-circle-check text-green-600 text-3xl"></i>
                </div>
                <p class="text-center mb-3">Pembayaran Berhasil!</p>
                <h1 class="text-3xl font-bold text-center">{{ $order->harga }}</h1>
            </div>
    
            <!-- Card Kedua -->
            <div class="bg-white px-5 py-7 w-[500px] rounded-xl">
                <p class="font-semibold text-lg">Detail Pembayaran</p>
                <div>
                    <div class="grid grid-cols-2 my-2">
                        <p>Nomor Transaksi</p>
                        <p class="text-right text-sm font-semibold">{{ $order->idTransaksi }}</p>
                    </div>
                    <div class="grid grid-cols-2 my-2">
                        <p>Status Transaksi</p>
                        <div class="flex items-center justify-end">
                            <div class="bg-green-400 rounded-full w-5 h-5 flex justify-center items-center bg-opacity-30 mr-2">
                                <i class="fa-solid fa-circle-check text-green-600 text-sm"></i>
                            </div>
                            <p class="text-right text-sm font-semibold">{{ $order->status }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 my-2">
                        <p>Waktu Transaksi</p>
                        <p class="text-right text-sm font-semibold">{{ $order->created_at }}</p>
                    </div>
                    <hr class="my-5">
                    <div class="grid grid-cols-2 my-2">
                        <p>Total Pembayaran</p>
                        <p class="text-right font-semibold">{{ $order->harga }}</p>
                    </div>
                </div>
            </div>
    
            <!-- Card Ketiga -->
            <div class="bg-white px-3 py-5 w-[500px] rounded-xl">
                    <div class="grid grid-cols-3">
                        <div class="flex col-span-2">
                            <div class="bg-gray-500 rounded-full w-12 h-12 flex justify-center items-center bg-opacity-15 mr-2">
                                <i class="fa-solid fa-clock-rotate-left text-gray-700 text-lg"></i>
                            </div>
                            <div class="my-2">
                                <h1 class="font-semibold text-sm">menuju Kehalaman riwayat transaksi</h1>
                                <p class="text-xs">ayo lihat riwayat transaksimu</p>
                            </div>
                        </div>
                        <div class="flex  justify-center items-center">
                            <i class="fa-solid fa-arrow-right-long text-right ml-10 text-3xl"></i> 
                        </div> 
                    </div>
                
            </div>
        </div>
    </div>
        

</body>
</html>
