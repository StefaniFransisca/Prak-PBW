<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
class MahasiswaController extends Controller
{
    public function home(){
        return view('home');
    }
    public function mahasiswa(){
        $mahasiswa = Mahasiswa::orderBy('id', 'desc')->paginate(10);
        return view('mahasiswa', ['mahasiswa'=>$mahasiswa]);
        //return $mahasiswa;
    }
    public function pencarian(Request $request){
        $cari = $request->cari;
        $mahasiswa = Mahasiswa::where('nama', 'like', '%'.$cari.'%')->orWhere('nim', 'like', '%'.$cari.'%')->paginate();
        return view('mahasiswa', ['mahasiswa'=>$mahasiswa]);
    }
    
    public function formulirmhs(){
        return view('formulirmhs');

    }

    public function simpanmhs(Request $request){
        $minat = implode(",", $request->get('minat'));
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender, 
            'jurusan' => $request->jurusan, 
            'bidang_minat' => $minat
        ]);
        return redirect('/mhs')->with('alert-success', 'Berhasil disimpan');
        
    }

    public function editmhs($id){
        $mahasiswa = mahasiswa::find($id);
        return view('editmhs', ['mahasiswa' =>$mahasiswa]);
    }

    public function updatemhs($id, Request $request){
        $minat = implode(',', $request -> minat); //request mengirim ke name = minat
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa -> nim = $request -> nim;
        $mahasiswa -> nama = $request -> nama;
        $mahasiswa -> gender = $request -> gender;
        $mahasiswa -> jurusan = $request -> jurusan;
        $mahasiswa -> bidang_minat = $minat;
        $mahasiswa -> save();
        return redirect('/mhs')->with('alert-warning', 'Berhasil diubah');
    }

    public function hapusmhs($id){
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa -> delete();
        return redirect('/mhs')->with('alert-danger', 'Berhasil dihapus');
    }
}
