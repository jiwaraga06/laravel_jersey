@extends('Admin.welcome')
@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Liga</h1>
                        <h5><a href="/product/liga" class="badge bg-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">Add Liga</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form method="POST" action="/store" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="name"
                            class="form-control @error('nama')
                        is-invalid
                    @enderror"
                            id="nama" name="nama" placeholder="Masukan Nama Liga">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="name"
                            class="form-control @error('nama')
                        is-invalid
                    @enderror"
                            id="negara" name="negara" placeholder="Negara Liga">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Poto Liga</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
