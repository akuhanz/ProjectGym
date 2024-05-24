@extends('layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-left">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">edit User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('paket.update',['id' => $data->id ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Form edit User</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="Paket">Paket</label>
                                        <input type="text" name="Paket" value="{{ $data->Paket}}" class="form-control" id="Paket" placeholder="Enter Paket">
                                        @Error('Paket')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi Paket</label>
                                        <input type="text" value="{{ $data->deskripsipaket}}" name="deskripsipaket" class="form-control" id="Deskripsi" placeholder="Enter deskripsi">
                                        @Error('Deskripsi')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Harga">Harga</label>
                                        <input type="number" value="{{ $data->harga}}" name="harga" class="form-control" id="Harga" placeholder="Harga">
                                        @Error('Harga')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" value="{{$data->gambar}}" name="gambar" class="form-control" id="gambar">
                                        @Error('gambar')
                                        <small>{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div><!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div><!-- /.card -->
                        </form>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
