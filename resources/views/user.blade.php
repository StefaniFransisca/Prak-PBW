@extends('layouts/main2')
@section('header')
    <a name="" class="btn btn-primary" href="/user/formuliruser" role="button"><i class="bi bi-person-plus-fill"></i> ADD USER</a>
    <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/user/cari">
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
                    <th scope="col">Nik User</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $no => $u)
                    <tr>
                        <th scope="row">{{ $user->firstitem() + $no }}</th>
                        <td>{{ $u->nik_user }}</td>
                        <td>{{ $u->nama_user }}</td>
                        <td>{{ $u->no_hp}}</td>
                        <td>
                            <a href="/user/edituser/{{$u -> id}}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil-square"></i></a>
                            <a href="/user/hapususer/{{$u -> id}}" class="delete btn btn-outline-danger" data-confirm="Apakah Anda Ingin Menghapus Data Ini?"><i class="bi bi-x-square"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span>Total Data: {{ $user->total() }}</span><br>
        <span>Total Data Per Halaman: {{ $user->count() }}</span><br>
        <span>Halaman {{ $user->currentpage() }}</span>
        <span class="float-right mt-1">{{ $user->links() }}</span>
        <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <b>Apakah Anda ingin menghapus data ini?</b><br><br>
                        <a href="/mhs/hapusmhs/{{$u -> id}}" class="btn btn-danger btn-ok">Hapus</a>
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
