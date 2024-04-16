@extends('layout.mains')
@section('content')

    <div class="row" style="margin-top: 100px">
        @foreach ($data as $produk)
        <div class="col-md-4">
            <div class="card mb-4 " style="width: 300px; margin-left: 80px; margin-right:80px">
                <img src="{{ asset('storage/produk/'.$produk->gambar) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$produk->nameproduk}}</h5>
                    <hr>
                    <h4 class="card-text" style="font-weight: bold;">Rp. {{ $produk->harga}}</h4>
                    <a href="#" class="btn btn-primary">Pesan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection