@extends('Admin.welcome')
@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Jersey</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">List Jersey</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <a href="/product/addJersey" class="btn btn-primary">Tambah</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Nama Jersey</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Jenis</th>
                        <th>Berat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <td>{{ $item->id }} </td>
                            <td>
                                <img src="{{ url('storage/assets/jersey') }}/{{ $item->gambar }}" alt="" class="img-fluid" style="width: 70px; height: 70px;">
                            </td>
                            <td>{{ $item->nama }} </td>
                            <td>{{ $item->harga }} </td>
                            @if ($item->is_ready == true)
                                <td>
                                    <span class="badge bg-success">Ready</span>
                                </td>
                            @else
                                <td>
                                    <span class="badge bg-danger">Not Ready</span>
                                </td>
                            @endif
                            <td>{{ $item->jenis }} </td>
                            <td>{{ $item->berat }} </td>
                            <td>
                                <a href="/product/{{ $item->id }}/editJersey" class="btn btn-warning"><i class ="fas fa-pencil"></i></a>
                                <a class="btn btn-danger"><i class ="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
