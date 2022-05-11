@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="">ListJersey</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <form action="{{ route('product') }}" method="GET">
                    <input wire:model="search" name="search" type="text" class="form-control" placeholder="Search...">
                </form>
                <span class="input-group-text" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
    </div>

    {{-- BEST PRODUCT --}}
    <section class="product">
        <div class="row mt-4">
            @foreach ($product as $products)
            <div class="col-md-3 mb-3">
                <div class="card border-light">
                    <div class="card-body text-center">
                        <img src="{{ url('assets/jersey') }}/{{ $products->gambar }}" alt="" class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $products->nama }}</strong></h5>
                                <p><strong>Rp. {{ $products->harga }}</strong></p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <a href="{{ route('product-detail', $products->id) }}" class="btn btn-dark btn-block" style="width: 100%" ><i
                                class="fa fa-eye" aria-hidden="true"></i> Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <div class="row">
        <div class="col">
            {{ $product->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
