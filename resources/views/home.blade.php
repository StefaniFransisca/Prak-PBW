@extends('layouts/main2')
@section('header')
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
          <h1> Selamat Datang Web UKDW </h1>
          <p>Web UKDW ini akan membantu anda melihat Data Mahasiswa yang nantinya dapat melakukan 
              penambahan data, pengeditan data dan penghapusan data.</p> 
@endsection
