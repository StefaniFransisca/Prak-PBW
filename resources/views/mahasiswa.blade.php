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
    <div class="card-body">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'primary'] as $msg)
            @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('alert-' . $msg) }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
          @endforeach
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Bidang Minat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $no => $mhs)
                    <tr>
                        <th scope="row">{{ $mahasiswa->firstitem() + $no }}</th>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->gender }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>{{ $mhs->bidang_minat }}</td>
                        <td>
                            <a href="/mhs/editmhs/{{$mhs -> id}}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil-square"></i></a>
                            <a href="/mhs/hapusmhs/{{$mhs -> id}}" class="delete btn btn-outline-danger" data-confirm="Apakah Anda Ingin Menghapus Data Ini?"><i class="bi bi-x-square"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span>Total Data: {{ $mahasiswa->total() }}</span><br>
        <span>Total Data Per Halaman: {{ $mahasiswa->count() }}</span><br>
        <span>Halaman {{ $mahasiswa->currentpage() }}</span>
        <span class="float-right mt-1">{{ $mahasiswa->links() }}</span>
        <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <b>Apakah Anda ingin menghapus data ini?</b><br><br>
                        <a href="/mhs/hapusmhs/{{$mhs -> id}}" class="btn btn-danger btn-ok">Hapus</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
             var deleteLinks = document.querySelectorAll('.delete');
                for (var i = 0; i < deleteLinks.length; i++) {
                    deleteLinks[i].addEventListener('click', function(event) {
                        event.preventDefault();

                        var choice = confirm(this.getAttribute('data-confirm'));

                        if (choice) {
                            window.location.href = this.getAttribute('href');
                        }
                    });
}
        </script>
       
@endsection
