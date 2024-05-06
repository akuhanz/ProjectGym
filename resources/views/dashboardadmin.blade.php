@extends('layout.main')
@section('content')

<div class="content-wrapper">
  <!-- Main Content -->
  <main class="container mt-20 ml-4 col-md-11 mr-4">
      <div class="row">
        <!-- Selamat Datang -->
        <div class="row mb-4 mt-4">
          <div class="col-md-12">
            <div class="bg-white p-3 rounded shadow border-radius">
              <h2 class="text-lg font-weight-bold mb-2">Selamat Datang,  {{ Auth::user()->name }}❤️ <Span class="text-base font-weight-normal"> Di sini Anda dapat mengelola data paket dan produk.</Span></h2>
            </div>
          </div>
        </div>
          <!-- Box 1 -->
          <div class="col-md-4 mt-4">
              <div class="bg-white p-4 rounded shadow h-110 py-4">
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="icon mr-3">
                          <i class="fa-solid fa-dumbbell fa-5x"></i>
                      </div>
                      <div class="content">
                          <h2 class="text-xl font-weight-bold mb-3 text-center">{{ $jumlahPaket }}</h2>
                          <p class="text-lg font-weight-bold text-center">Daftar Data Paket</p>
                          <a href="{{route('paket')}}" class="btn btn-primary btn-block mt-2">View Details</a> <!-- Tambahkan kelas btn btn-primary btn-block -->
                      </div>
                  </div>
              </div>
          </div>
          <!-- Box 2 -->
          <div class="col-md-4 mt-4">
            <div class="bg-dark p-4 rounded shadow h-110 py-4 text-light"> <!-- Tambahkan kelas bg-dark dan text-light -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="icon mr-3">
                        <i class="fa-solid fa-cart-shopping fa-5x"></i>
                    </div>
                    <div class="content">
                        <h2 class="text-xl font-weight-bold mb-3 text-center">{{ $jumlahProduk }}</h2>
                        <p class="text-lg font-weight-bold text-center">Daftar Data Produk</p>
                        <a href="{{route('produk')}}" class="btn btn-primary btn-block mt-2">View Details</a> <!-- Tambahkan kelas btn btn-primary btn-block -->
                    </div>
                </div>
            </div>
          </div>
      </div>
  </main>
</div>




  @endsection
