@extends('layout.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">PENJUALAN PAKET</h1>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->

  <div class="content">
      <div class="container-fluid">
          <div class="row justify-content-center"> <!-- Centering content horizontally -->
              <div class="col-lg-12"> <!-- Adjust the width of the content -->
                  <div class="card">
                      <div class="card-body">
                          <table class="table table-hover fs-5" style="text-align: justify;">
                              <thead>
                                  <tr>
                                      <th>No Transaction</th>
                                      <th>Name</th>
                                      <th>Item</th>
                                      <th>harga</th>
                                      <th>Transaction Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($datap as $transaksipaket)
                                  <tr>
                                      <td>{{ $transaksipaket->idTransaksi}}</td>
                                      <td>{{ $transaksipaket->name}}</td>
                                      <td>{{ $transaksipaket->Paket}}</td>
                                      <td>{{ $transaksipaket->harga}}</td>
                                      <td>{{ $transaksipaket->created_at}}</td>
                                    </tr>
                                    @endforeach                           
                              </tbody>
                          </table>
                      </div>
                      <div class="d-flex justify-content-end mx-3">
                        {{ $datap->links() }}
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

@endsection