@extends('layout.mains')
@section('content')
    
<div class="d-flex " style="margin-top: 35px">
    {{-- Bagian data paket gym --}}
    <div class="jojo">
    @foreach ($data as $p)
        <div class="card" style="width: 30rem; margin-left:20px; margin-bottom: 50px;">
          <img src="{{ asset('storage/images/'.$p->gambar) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$p->Paket}}</h5>
                <p class="card-text">{{$p->deskripsipaket}}</p>
                <a href="#" class="btn btn-primary ">Pesan </a>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection