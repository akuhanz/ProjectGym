@extends('layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('produk')}}">kembali</a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">edit daftar produk</li>
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
                        <form action="{{ route('produk.update',['id' => $data->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Form edit User</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="produk">produk</label>
                                        <input type="text" name="nameproduk" value="{{ $data->nameproduk}}" class="form-control" id="produk" placeholder="Enter produk">
                                        @Error('produk')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">stok</label>
                                        <input type="number" name="stok" value="{{ $data->stok}}" class="form-control" id="stok" placeholder="Enter stok">
                                        @Error('stok')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskpsi">Deskripsi produk</label>
                                        <input type="text" value="{{ $data->deskripsiproduk}}" name="deskripsiproduk" class="form-control" id="Deskripsi" placeholder="Enter deskripsi">
                                        @Error('Deskripsi')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Harga">harga</label>
                                        <input type="number" value="{{ $data->harga}}" name="harga" class="form-control" id="Harga" placeholder="Harga">
                                        @Error('Harga')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">gambar</label>
                                        <input type="file" value="{{$data->gambar}}" name="gambar" class="form-control" id="gambar">
                                        @Error('gambar')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.card -->
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
