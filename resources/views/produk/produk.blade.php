@extends('layout.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Daftar Produk</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Data produk</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
      <div class="container-fluid">
          <div class="row justify-content-center"> <!-- Centering content horizontally -->
              <div class="col-lg-12"> <!-- Adjust the width of the content -->
                  <div class="card">
                      <div class="card-body">
                          <a href="{{route('produk.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
                          <table class="table table-hover fs-5" style="text-align: justify;">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>produk</th>
                                      <th>Deskripsi</th>
                                      <th>stok</th>
                                      <th>Harga</th>
                                      <th>Gambar</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($data as $produk)
                            
                                  <tr>
                                      <td>{{ $loop->iteration}}</td>
                                      <td>{{$produk->nameproduk}}</td>
                                      <td>{{$produk->deskripsiproduk}}</td>
                                      <td style="width: 50px">{{$produk->stok}}</td>
                                      <td style="width: 100px">{{$produk->harga}}</td>
                                      <td>{{$produk->gambar}}</td>
                                      <td style="width: 180px">
                                          <a data-toggle="modal" data-target="#modal-edit{{$produk->id}}"
                                              class="btn btn-primary"><i class="fas fa-pen"></i>edit</a>
                                          <a data-toggle="modal" data-target="#modal-hapus{{$produk->id}}"
                                              class="btn btn-danger"><i class="fas fa-trash-alt"></i>hapus</a>
                                      </td>
                                  </tr>
                                  <div class="modal fade" id="modal-hapus{{$produk->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Apakah Anda yakin ingin menghapus data <b>   {{$produk->nameproduk}}</b> ?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <form action="{{ route('produk.delete',['id' => $produk->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="d-flex justify-content-between w-100">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak, Saya takut</button>
                                              <button type="submit" class="btn btn-danger">Ya, Hapus data</button>
                                          </div>
                                          </form>
                                        </div>
                                    </div>
                                     
                                    </div>
                                    
                                  </div>
                                  </div>
                                  <div class="modal fade" id="modal-edit{{$produk->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Konfirmasi edit produk</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Apakah Anda yakin ingin mengganti produk <b>{{ $produk->nameproduk}}</b> ini?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <a href="{{route('produk.edit',['id' => $produk->id])}}" class="btn btn-primary"><i class="fas fa-pen"></i>Ya, Ganti</a>
                                        </div>
                                    </div>
                             
                                </div>
                                
                              </div>
                                  </div>
                              
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

@endsection
