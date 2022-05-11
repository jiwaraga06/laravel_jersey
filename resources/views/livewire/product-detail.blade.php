@extends('layouts.app')
@section('content')
<div>
    <div class="container">
        <div class="row mb-2 mt-3">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item"><a href="/product" class="text-dark">ListJersey</a></li>
                        <li class="breadcrumb-item active" aria-current="">JerseyDetail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-light shadow gambar-product">
                    <div class="card-body">
                        <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3><strong>{{ $product->nama }}</strong></h3>
                <h4>
                    @if ($product->is_ready == 1)
                    <span class="badge bg-success"><i class="fa fa-check"></i> Ready Stock</span>
                    @else
                    <span class="badge bg-danger"><i class="fas fa-times"></i> Stock Habis</span>
                    @endif
                </h4>
                <h4>Rp. {{ number_format($product->harga) }}</h4>
                <div class="row">
                    <div class="col">
                        <section>
                            <form wire:submit.prevent="masukanKeranjang">
                                <table class="table" style="border-top: hidden">
                                    <tr>
                                        <td>Liga</td>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ url('assets/liga') }}/{{ $product->liga->gambar }}" alt=""
                                                class="img-fluid" width="50">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis</td>
                                        <td>:</td>
                                        <td>{{ $product->jenis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Berat</td>
                                        <td>:</td>
                                        <td>{{ $product->berat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah{{ $jumlah_pesanan }}</td>
                                        <td>:</td>
                                        <td>
                                            <input wire:model="jumlah_pesanan" type="number" name="jumlah_pesanan"
                                                class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                                value="{{ old('jumlah_pesanan') }}" required
                                                placeholder="Masukan Jumlah Pesanan">
                                            @error('jumlah_pesanan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>
                                    </tr>
                                    @if ($jumlah_pesanan > 1)
                                    <div class="container"></div>
                                    @else
                                    <tr>
                                        <td colspan="3"><strong>Nameset (isi jika tambah nameset)</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>
                                            <input wire:model="nama" id="nama" type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ old('nama') }}" autocomplete="nama"
                                                placeholder="Masukan Nama">
                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td>
                                            <input wire:model="nomor" id="nomor" type="number"
                                                class="form-control @error('nomor') is-invalid @enderror" name="nomor"
                                                value="{{ old('nomor') }}" autocomplete="nomor"
                                                placeholder="Masukan Nomor Punggung">
                                            @error('nomor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>
                                    </tr>
                                    @endif

                                    <tr>
                                        <td colspan="3">
                                            <button wire:submit="masukanKeranjang" type="submit" class="btn btn-dark btn-block" style="width: 100%"><i
                                                    class="fa fa-shopping-bag" aria-hidden="true"></i> Masukan
                                                Keranjang</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
