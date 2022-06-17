@extends('layouts/main2')
@section('header')
    <a name="" class="btn btn-primary" href="/user/formuliruser" role="button"><i class="bi bi-person-plus-fill"></i> ADD
        USER</a>
    <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/user/cari">
        <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
@endsection
@section('body')
    <div class="container-fluid mt-4 rounded">
        <form action="/user/simpanuser" method="POST" class="pt-2 pb-2">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group w-25">
                <label>Nik User</label>
                <input type="number" name="nik_user" class="form-control" placeholder="Masukan Nik " required autofocus>
            </div>
            <div class="form-group w-25">
                <label>Nama User</label>
                <input type="text" name="nama_user" class="form-control" placeholder="Masukan Nama " required>
            </div>
            <div class="form-group w-25">
                <label>No Hp</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No Hp " required>
            </div>
            <div class="form-group w-25">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan Pasword " required>
            </div>
            <div class="form-group pt-4">
                <input type="submit" value="SIMPAN" class="btn btn-outline-primary">
            </div>
        </form>
    </div>
@endsection