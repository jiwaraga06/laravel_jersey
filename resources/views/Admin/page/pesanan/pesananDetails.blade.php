@extends('Admin.welcome')
@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pesanan Detail</h1>
                        <h5><a href="/pesanan" class="badge bg-primary"><i class="fas fa-add"></i> Tambah Pesanan</a></h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Pesanan</li>
                            <li class="breadcrumb-item active">Detail Pesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nama Product</td>
                        <td>Total Harga</td>
                        <td>Jumlah Pesanan</td>
                        <td>Nama</td>
                        <td>Name Set</td>
                        <td>Gambar</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesananDetails as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama_product }}</td>
                            <td>{{ $item->total_harga }}</td>
                            <td>{{ $item->jumlah_pesanan }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nameset }}</td>
                            <td><img src="{{ url('storage/assets/jersey') }}/{{ $item->gambar }}" alt=""
                                    class="img-fluid" style="width: 70px; height: 70px;"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
