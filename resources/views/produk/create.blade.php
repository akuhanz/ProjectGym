@extends('layout.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                <a href="{{route('produk')}}">Kembali</a>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Tambah Produk</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
      <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Form Tambah produk</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="Produk">Produk</label>
                                  <input type="text" name="nameproduk" class="form-control" id="Produk" placeholder="Enter Produk">
                                  @error('Produk')
                                      <small>{{ $message}}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="Deskripsi">Deskripsi Paket</label>
                                  <input type="text" name="deskripsiproduk" class="form-control" id="Deskripsi" placeholder="Enter deskripsi">
                                  @error('Deskripsi')
                                      <small>{{ $message}}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="Stok">Stok</label>
                                  <input type="number" name="stok" class="form-control" id="Stok" placeholder="Enter stok">
                                  @error('Stok')
                                      <small>{{ $message}}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="Harga">harga</label>
                                  <input type="number" name="harga" class="form-control" id="Harga" placeholder="Harga">
                                  @error('Harga')
                                      <small>{{ $message}}</small>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="gambar">gambar</label>
                                  <input type="file" name="gambar" class="form-control" id="gambar" placeholder="gambar">
                                  @error('gambar')
                                      <small>{{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                      <!-- /.card -->
                  </form>
              </div>
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
</div>

@endsection