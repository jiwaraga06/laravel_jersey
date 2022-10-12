@extends('Admin.welcome')
@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Jersey</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                            <li class="breadcrumb-item active">Add Jersey</li>
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
                        <input type="name" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Product">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Product">
                    </div>
                    <div class="form-group">
                        <label for="harga_nameset">Harga Nameset</label>
                        <input type="number" class="form-control" id="harga_nameset" name="harga_nameset" placeholder="Harga Product"
                            value="50000" disabled>
                    </div>
                    <div class="form-group">
                        <label for="harga_nameset">Berat</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Berat" value="0.25"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="harga_nameset">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio" id="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Ready
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio" id="0" >
                            <label class="form-check-label" for="flexRadioDefault2">
                              Not Ready
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Jenis</label>
                        <select class="custom-select form-control-border" id="exampleSelectBorder">
                            <option value="Replica Top Quality">Replica Top Quality</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Liga</label>
                        <select class="custom-select form-control-border" id="liga_id" name="liga_id">
                            @foreach ($liga as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Poto Product</label>
                        <input class="form-control" type="file" id="gambar" name="gambar">
                      </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
