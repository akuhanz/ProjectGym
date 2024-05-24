@extends('layout.tailwind')
@section('content')
    
<div class="flex mt-20 flex-wrap h-full">
    {{-- Bagian data paket gym --}}
    @foreach ($data as $p)
    <div class="mx-auto h-full">
        <div class="bg-white rounded-lg shadow-md mb-4 w-72 sm:mx-4 sm:w-[350px] h-full">
            <img src="{{ asset('storage/images/'.$p->gambar) }}" class="rounded-t-lg w-full h-52 sm:h-60" alt="...">
            <div class="mx-3 mt-2">
                <h5 class="font-bold text-xl uppercase font-sans truncate">{{$p->Paket}}</h5>
                <p class="font-semibold text-sm text-justify">{{$p->deskripsipaket}}</p>
            </div>
            <div class="mx-auto mt-auto">
                <a href="#" class="inline-block text-center font-medium text-sm text-white bg-emerald-600 w-full rounded-b-lg hover:opacity-80 px-4 py-2 uppercase no-underline">Pesan</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection