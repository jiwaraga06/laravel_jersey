@extends('layouts.app')

@section('content')
<div class="container">

    {{-- BANNER GAMBAR --}}
    <div class="banner">
        <img src="{{ url('assets/slider/slider1.png') }}" alt="">
    </div>

    {{-- LIGA --}}
    <section class="pilih-liga mt-4">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="row mt-4">
            @foreach ($liga as $ligas)
            <div class="col">
                <a href="{{ route('product-liga', $ligas->id) }}">
                    <div class="card shadow border-light">
                        <div class="card-body text-center">
                            <img src="{{ url('assets/liga') }}/{{ $ligas->gambar }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- BEST PRODUCT --}}
    <section class="product mt-5">
        <h3>
            <strong>Best Product</strong>
            <a href="/product" class="btn btn-dark float-right"><i class="fa fa-eye" aria-hidden="true"></i>Lihat
                Semua</a>
        </h3>
        <div class="row mt-4">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card border-light">
                    <div class="card-body text-center">
                        <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" alt="" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $product->nama }}</strong></h5>
                                <p><strong>Rp. {{ $product->harga }}</strong></p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <a href="{{ route('product-detail',$product->id) }}" class="btn btn-dark btn-block" style="width: 100%"><i class="fa fa-eye"
                                    aria-hidden="true"></i>
                                Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
