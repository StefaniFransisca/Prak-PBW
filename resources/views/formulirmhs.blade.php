@extends('layouts/main2')
@section('header')
<a name="" class="btn btn-primary" href="/mhs/formulirmhs" role="button"><i class="bi bi-person-plus-fill"></i> ADD MAHASISWA</a>
    <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/mhs/cari">
        <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
@endsection
@section('body')
<div class="container-fluid mt-4 rounded">
    <form action="/mhs/simpanmhs" method="POST" class="pt-2 pb-2">
        @csrf
        <div class="form-group w-25">
        <label>Nim</label>
        <input type="number" name="nim" class="form-control" placeholder="Masukan Nim " required>
        </div>
        <div class="form-group w-25">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama " required>
        </div>
        <label>Gender</label>
        <div class="form-check w-25">
            <input type="radio" class="form-check-input" name="gender" value="Pria">
            <label>Pria</label>
        </div>
        <div class="form-check w-25">
            <input type="radio" class="form-check-input" name="gender" value="Wanita">
            <label>Wanita</label>
        </div>
        <div class="form-group w-25">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan">
            <option value="0" disabled selected>---Pilihan Jabatan Fungsional---</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknologi Informatika">Teknologi Informatika</option>
            <option value="Arsitektur">Arsitektur</option>
            <option value="Kedokteran">Kedokteran</option>
            <option value="Farmasi">Farmasi</option>
            <option value="Bioteknologi">Bioteknologi</option>
            <option value="Psikologi">Psikologi</option>
            <option value="Management">Management</option>
            <option value="Teknik Industri">Teknik Industri</option>
        </select>
        </div>
        <label>Bidang Minat</label>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Badminton">
            <label>Badminton</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Basket">
            <label>Basket</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Voli">
            <label>Voli</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Musik">
            <label>Musik</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Dance">
            <label>Dance</label>
        </div>
        <div class="form-group pt-4">
          <input type="submit" value="SIMPAN" class="btn btn-outline-primary">
        </div>
    </form>
</div>
@endsection