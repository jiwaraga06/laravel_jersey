@extends('Admin.welcome')
@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Account</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No.Hp</th>
                        <th>Poto</th>
                        <th>Status Verifikasi Email</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nohp }}</td>
                            <td></td>
                            <td>
                                @if ($item->email_verified_at)
                                    <span class="badge bg-success"><i class="fas fa-check"></i> Verified</span>
                                @else
                                    <span class="badge bg-danger"><i class="fas fa-xmark"></i> Not Verified</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->email_verified_at)
                                    {{ $item->email_verified_at }}
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                                <form action="" method="">
                                    @csrf
                                    <button class="btn btn-danger" onclick=" return confirm('Apakah Anda Yakin ?')"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
