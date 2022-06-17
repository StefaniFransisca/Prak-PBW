@extends('layouts/main2')
@section('header')
<a name="" class="btn btn-primary" href="/user/formuliruser" role="button"><i class="bi bi-person-plus-fill"></i> ADD user</a>
@endsection
@section('body')
<div class="container-fluid mt-4 rounded">
    <form action="/user/updateuser/{{$user -> id}}" method="POST" class="pt-2 pb-2">
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
        @method('PUT')
        <div class="form-group w-25">
            <label>Nik User</label>
            <input type="number" name="nik_user" class="form-control" placeholder="Masukan Nik " value="{{$user -> nik_user}}" readonly>
            </div>
            <div class="form-group w-25">
                <label>Nama User</label>
                <input type="text" name="nama_user" class="form-control" placeholder="Masukan Nama " value="{{$user -> nama_user}}" required>
            </div>
            <div class="form-group w-25">
                <label>No Hp</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No Hp " value="{{$user -> no_hp}}"required>
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