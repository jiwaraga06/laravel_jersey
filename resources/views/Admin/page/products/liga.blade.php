@extends('Admin.welcome')
@section('admin-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Liga</h1>
                    <h5><a href="/product/addLiga" class="badge bg-primary"><i class="fas fa-add"></i> Add Liga</a></h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                        <li class="breadcrumb-item active">List Liga</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama Liga</th>
                    <th>Negara</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($liga as $item)
                    <tr>
                        <td>{{ $item->id }} </td>
                        <td>
                            <img src="{{ url('assets/liga') }}/{{ $item->gambar }}" alt="" class="img-fluid" style="width: 70px; height: 70px;">
                        </td>
                        <td>{{ $item->nama }} </td>
                        <td>{{ $item->negara }} </td>
                        <td>
                            <button class="btn btn-danger"><i class ="fas fa-trash"></i></button>
                            <button class="btn btn-warning"><i class ="fas fa-pencil"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
