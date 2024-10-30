<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key')}}"></script>
    
    <title>Halaman Transaksi</title>
    
    {{-- TailwindCSS --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-metal">
    
    <div class="h-screen flex justify-center items-center">
      <div class="flex container justify-center object-center">
        <div class="bg-white px-5 py-7 max-w-[450px] rounded-xl">
            <div class="card-body border-none">
                <h5 class="card-title text-center mb-7 text-xl font-bold">Detail Pesanan</h5>
                <div class="mx-2 mt-3 grid grid-cols-7 mb-7">
                    <img src="{{ asset('storage/images/'.$order->gambar)}}" alt="" class="w-20 h-14 object-cover rounded-lg border border-slate-400 shadow-md shadow-gray-300 ">
                    <div class="col-span-4 mx-4 my-1">
                        <h1 class="text-base font-semibold w-auto ">{{ $order->Paket }}</h1>
                        <p class="text-xs">{{ $order->created_at }}</p>
                    </div>
                    <h2 class="text-lg flex items-center justify-end font-bold col-span-2">{{ $order->harga }}</h2>
                </div>

                <hr class="opacity-20 border-2">

                <div class="grid grid-cols-2 mx-2 mt-4 mb-4">
                    <p class="font-semibold">Nama</p>
                    <p class="text-right font-bold mb-4 text-sm">{{ $order->name }}</p>
                    <p class="font-semibold">Nomor</p>
                    <p class="text-right font-bold text-sm">{{ $order->number }}</p>
                </div>

                <hr class="opacity-20 border-2">

                <div class="grid grid-cols-2 mx-3 mt-10 mb-7">
                    <h2 class="text-lg font-semibold">Total</h2>
                    <h1 class="text-right text-xl font-bold">{{ $order->harga }}</h1>
                </div>

                <button class="bg-black p-2 rounded-lg w-full text-white hover:bg-gray-700 transition duration-300 ease-in-out" id="pay-button">Bayar Sekarang</button>
            </div>
        </div>
      </div>
    </div>

    <!-- Background overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden"></div>

    <!-- This div will act as a placeholder for the Snap pop-up -->
    <div id="snap-container" class="absolute w-[450px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2  justify-center items-center hidden"></div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        var overlay = document.getElementById('overlay');
        var snapContainer = document.getElementById('snap-container');

        payButton.addEventListener('click', function () {
            // Show overlay and snap container
            overlay.classList.remove('hidden');
            snapContainer.classList.remove('hidden');

            // Trigger snap popup. Replace TRANSACTION_TOKEN_HERE with your transaction token.
            window.snap.embed('{{ $snapToken}}', {
                embedId: 'snap-container',
                onSuccess: function (result) {
                    // You may add your own implementation here
                    window.location.href = '/invoice/{{$order->id}}'
                    console.log(result);
                },
                onPending: function (result) {
                    // You may add your own implementation here
                    alert("waiting for your payment!"); console.log(result);
                },
                onError: function (result) {
                    // You may add your own implementation here
                    alert("payment failed!"); console.log(result);
                },
                onClose: function () {
                    // Hide overlay and snap container when popup is closed
                    overlay.classList.add('hidden');
                    snapContainer.classList.add('hidden');
                    alert('You closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>
</html>
