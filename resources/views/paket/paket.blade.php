@extends('layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">MISI PAKET</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Paket</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('paket.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover fs-5" style="text-align: justify;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Paket</th>
                                                <th>Deskripsi Paket</th>
                                                <th>Harga</th>
                                                <th>Gambar</th>
                                                <th style="width: 180px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $p)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$p->Paket}}</td>
                                                <td>{{$p->deskripsipaket}}</td>
                                                <td>{{$p->harga}}</td>
                                                <td>{{$p->gambar}}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#modal-edit{{$p->id}}" class="btn btn-primary"><i class="fas fa-pen"></i>edit</a>
                                                    <a data-toggle="modal" data-target="#modal-hapus{{$p->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>hapus</a>
                                                </td>
                                            </tr>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="modal-hapus{{$p->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus data <b>{{$p->Paket}}</b> ?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('paket.delete',['id' => $p->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Ya, Hapus data</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modal-edit{{ $p->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Konfirmasi edit paket</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin mengganti<b>{{ $p->Paket}}</b> ini?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <a href="{{route('paket.edit',['id' => $p->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i>Ya, Ganti</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
