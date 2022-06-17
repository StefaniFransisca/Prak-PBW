@extends('layouts/main2')
@section('header')
<a name="" class="btn btn-primary" href="/mhs/formulirmhs" role="button"><i class="bi bi-person-plus-fill"></i> ADD MAHASISWA</a>
@endsection
@section('body')
<div class="container-fluid mt-4 rounded">
    @php
        $minat = explode(',', $mahasiswa -> bidang_minat);
    @endphp
    <form action="/mhs/updatemhs/{{$mahasiswa -> id}}" method="POST" class="pt-2 pb-2">
        @csrf
        @method('PUT')
        <div class="form-group w-25">
        <label>Nim</label>
        <input type="number" name="nim" class="form-control" placeholder="Masukan Nim " value="{{$mahasiswa -> nim}}" readonly>
        </div>
        <div class="form-group w-25">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama " value="{{$mahasiswa -> nama}}"required>
        </div>
        <label>Gender</label>
        <div class="form-check w-25">
            <input type="radio" class="form-check-input" name="gender" value="Pria" {{$mahasiswa -> gender =='Pria'? 'checked' : ''}}>
            <label>Pria</label>
        </div>
        <div class="form-check w-25">
            <input type="radio" class="form-check-input" name="gender" value="Wanita" {{$mahasiswa -> gender =='Wanita'? 'checked' : ''}}>
            <label>Wanita</label>
        </div>
        <div class="form-group w-25">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan">
            <option value="0" disabled selected>---Pilihan Jabatan Fungsional---</option>
            <option value="Sistem Informasi" {{$mahasiswa -> jurusan =='Sistem Informasi'? 'selected' : ''}}>Sistem Informasi</option>
            <option value="Teknologi Informatika" {{$mahasiswa -> jurusan =='Teknologi Informatika'? 'selected' : ''}}>Teknologi Informatika</option>
            <option value="Arsitektur" {{$mahasiswa -> jurusan =='Arsitektur'? 'selected' : ''}}>Arsitektur</option>
            <option value="Kedokteran" {{$mahasiswa -> jurusan =='Kedokteran'? 'selected' : ''}}>Kedokteran</option>
            <option value="Farmasi" {{$mahasiswa -> jurusan =='Farmasi'? 'selected' : ''}}>Farmasi</option>
            <option value="Bioteknologi" {{$mahasiswa -> jurusan =='Bioteknologi'? 'selected' : ''}}>Bioteknologi</option>
            <option value="Psikologi" {{$mahasiswa -> jurusan =='Psikologi'? 'selected' : ''}}>Psikologi</option>
            <option value="Management" {{$mahasiswa -> jurusan =='Management'? 'selected' : ''}}>Management</option>
            <option value="Teknik Industri" {{$mahasiswa -> jurusan =='Teknik Industri'? 'selected' : ''}}>Teknik Industri</option>
        </select>
        </div>
        <label>Bidang Minat</label>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Badminton" {{in_array('Badminton',$minat) ? 'checked' : ''}}>
            <label>Badminton</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Basket" {{in_array('Basket',$minat) ? 'checked' : ''}}>
            <label>Basket</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Voli" {{in_array('Voli',$minat) ? 'checked' : ''}}>
            <label>Voli</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Musik" {{in_array('Musik',$minat) ? 'checked' : ''}}>
            <label>Musik</label>
        </div>
        <div class="form-check w-25">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Dance" {{in_array('Dance',$minat) ? 'checked' : ''}}>
            <label>Dance</label>
        </div>
        <div class="form-group pt-4">
          <input type="submit" value="SIMPAN" class="btn btn-outline-primary">
        </div>
    </form>
</div>
@endsection